<?php
class DB {
    protected static $conn;
    
    function __construct() {
        if (!isset(self::$conn)) {
            $user = ini_get("mysqli.default_user");
            $host = ini_get("mysqli.default_host");
            $pw = ini_get("mysqli.default_pw");
            self::$conn = new mysqli($host, $user, $pw, "loja");
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //ativar exceções mysqli
        }
        return self::$conn;
    }

    function query($q) {
        return self::$conn->query($q);
    }

    function select($q){
        $rows = array();
        $result = $this->query($q);
        while($row = $result->fetch_assoc()) {
            // Melhor do que array_push:
            $rows[] = $row;
        }
        return $rows;
    }

    function first($q){
        return $this->select($q)[0];
    }

    function escape($param) {
        return mysqli_real_escape_string(self::$conn, $param);
    }
}
?>