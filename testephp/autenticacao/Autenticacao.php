<?php
session_start();
require_once('../usuario/UsuarioDao.php');
class Autenticacao {

    function verificarSeEstahLogado(){
        return isset($_SESSION['usuario_logado']);
    }

    function obterUsuarioLogado(){
        return $_SESSION['usuario_logado'];
    }

    function logar($usuario){
        $u = (new UsuarioDao())->buscar($usuario);
        if ($u != null) {
            $_SESSION['usuario_logado']=$u->getLogin();
        } else {
            throw new Exception("Erro no logon");
        }
    }

    function deslogar(){
        unset($_SESSION['usuario_logado']); // melhor que session_destroy();
        header("Location:index.php");
        exit();
    }

}
?>