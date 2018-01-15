<?php
class Usuario {
    private $login;
    private $senhaMD5;

    function __construct($login, $senha){
        $this->setLogin($login);
        $this->setSenha($senha);
    }

    function getLogin() {
        return $this->login;
    }

    function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    function getSenha() {
        return $this->senhaMD5;
    }
    
    function setSenha($senha) {
        $this->senhaMD5 = md5($senha);
        return $this;
    }
}

?>