<?php
require_once('../DB.php');
require_once('Usuario.php');
class UsuarioDao {

    protected $db;

    function __construct() {
        $this->db = new DB();
    }

    function buscar($u){
        $login = $this->db->escape($u->getLogin());
        $senha = $this->db->escape($u->getSenha());
        $q="SELECT * FROM usuarios WHERE login='{$login}' AND senha='{$senha}'";
        $result = $this->db->first($q);
        return new Usuario($result['login'], $result['senha']);
    }

    function inserir($u) {
        $this->db->query("INSERT INTO usuarios(login,senha) VALUES ('{$login}','{$senhaMD5}')");
    }

    function listar(){
        return $this->db->select("SELECT * FROM usuarios");
    }

    function remover($conexao,$id){
        $this->db->query("DELETE FROM usuarios where id={$id}");
    }

}
 
?>