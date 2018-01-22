<?php
require_once('Dao.php');
require_once('ReflectedObject.php');
class MySqlDao extends Dao{

    protected static $conn;

    function __construct() {
        if (!isset(self::$conn)) {
            $user = ini_get("mysqli.default_user");
            $host = ini_get("mysqli.default_host");
            $pw = ini_get("mysqli.default_pw");
            self::$conn = new mysqli($host, $user, $pw, "loja");
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //ativar exceptions mysqli
        }
        return self::$conn;
    }

    function gravar($obj){
        $o = new ReflectedObject($obj);
        empty($o->getId()) ? $this->insert($o) : $this->update($o);
    }

    function listar($obj){
        $o = new ReflectedObject($obj);
        $q = 'select '.$this->turnObjectIntoSelectClauses($o, '');
        $q .= " from {$o->getName()} ".$this->turnObjectIntoJoins($o);
        $q .= ' where 1=1 '.$this->turnObjectIntoWhereClauses($o);
        $results = $this->run($q);
        return $this->turnResultsIntoObjectList($results, $o);
    }

    function buscarUm($obj){
        return $this->listar($obj)[0];
    }

    function remover($obj){
        $o = new ReflectedObject($obj);
        $q = "delete from {$o->getName()} where id = {$o->getId()}";
        $this->run($q);
    }

    protected function insert($o){
        $columns = '';
        $values = '';
        foreach($this->generateColumnNamesForInsertAndUpdate($o) as $col => $val) {
            $columns .= "{$col}, ";
            $values .= "'{$val}', ";
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $this->run("INSERT INTO {$o->getName()} ({$columns}) VALUES ({$values})");
    }

    protected function update($o){
        $q = "UPDATE {$o->getName()} set ";
        foreach($this->generateColumnNamesForInsertAndUpdate($o) as $col => $val) {
            $q .= "{$col} = '{$val}', ";
        }
        $q = rtrim($q, ', ');
        $q .= " where id = '{$o->getId()}'";
        $this->run($q);
    }

    protected function generateColumnNamesForInsertAndUpdate($o){
        $cols = array();
        foreach($o->getProperties() as $key => $val){
            if (is_object($val)) {
                $cols["{$key}_id"] = $val->getId();
            } else {
                $cols[$key] = $val;
            }
        }
        unset($cols['id']); //Edson: tirando porque normalmente não precisa do ID pois é autoincrement
        return $cols;
    }

    // Recursivo por causa dos relacionamentos
    protected function turnObjectIntoSelectClauses($o, $prefix) {
        $str = '';
        $objNameLower = strtolower($o->getName());
        foreach($o->getProperties() as $col => $val){
            if (is_object($val)){
                $str.= $this->turnObjectIntoSelectClauses($val, "{$prefix}{$objNameLower}\$");
            } else {
                $str.= "{$o->getName()}.$col as {$prefix}{$objNameLower}\${$col}, ";
            }
        }
        $str = rtrim($str, ', ');
        return $str;
    }

    // Não está recursivo. Deveria estar.
    protected function turnObjectIntoJoins($o){
        $str = '';
        foreach($o->getProperties() as $col => $val){
            if (is_object($val)){
                $str .= "left join {$val->getName()} on {$o->getName()}.{$col}_id = {$val->getName()}.id";
            }
        }
        $str = rtrim($str, ', ');
        return $str;
    }

    protected function turnObjectIntoWhereClauses($o) {
        $str = '';
        $objNameLower = strtolower($o->getName());
        foreach($o->getProperties() as $col => $val){
            if (is_object($val)){
                $str.= $this->turnObjectIntoWhereClauses($val, "{$objNameLower}\$");
            } else {
                if (!empty($val)){
                    $str.="and {$objNameLower}.{$col} = '{$val}' ";
                }
            }
        }
        return $str;
    }

    function turnResultsIntoObjectList($results, $o){
        $transformedResults = array();
        while ($row = $results->fetch_assoc()){
            $transformedResults[] = $this->turnSingleResultIntoObject($row, $o);
        }
        return $transformedResults;
    }

    function turnSingleResultIntoObject($row, $o){
        $newObj = $o->newInstance();
        foreach($row as $key => $val){
            $this->putColumnValueIntoObject($newObj, substr($key, strpos($key, '$') + 1), $val);
        }
        return $newObj->getObject();
    }

    //Tem de ser recursivo porque o formato da key é produto$categoria$tipo$nome
    function putColumnValueIntoObject($o, $key, $val){
        $posOfDollar = strpos($key, '$');
        if ($posOfDollar > 0) {
            $innerObjName = substr($key, 0, $posOfDollar);
            $keyNameOnInnerObj = substr($key, $posOfDollar + 1);
            $this->putColumnValueIntoObject($o->getProperty($innerObjName), $keyNameOnInnerObj, $val);
        } else {
            $o->setProperty($key, $val);
        }
    }

    function escape($param) {
        return mysqli_real_escape_string(self::$conn, $param);
    }

    protected function run($q) {
        return self::$conn->query($q);
    }

}
?>