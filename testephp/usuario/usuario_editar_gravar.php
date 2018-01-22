<?php
    require_once("../autenticacao/verificar.php");
    require_once('../usuario/Usuario.php');
    require_once('../db/DaoFactory.php');
    $usuario = new Usuario();
    $usuario->setId(isset($_REQUEST["id"]) ? $_REQUEST["id"] : null);
    $usuario->setLogin($_REQUEST["login"]);
    $usuario->setSenha($_REQUEST["senha"]);
    DaoFactory::get()->dao()->gravar($usuario);
    header("Location:usuario_listar.php");
?>