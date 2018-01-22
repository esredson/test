<?php
class Usuario {
    private $id;
    private $login;
    private $senha;

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
        return $this;
    }

    function getLogin() {
        return $this->login;
    }

    function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    function getSenha() {
        return $this->senha;
    }
    
    function setSenha($senha) {
        $this->senha = md5($senha);
        return $this;
    }
}

?>