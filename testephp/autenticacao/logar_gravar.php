<?php
require_once("Autenticacao.php");
require_once("../usuario/Usuario.php");
$usu = new Usuario();
$usu->setLogin($_REQUEST['login']);
$usu->setSenha($_REQUEST['senha']);
(new Autenticacao())->logar($usu);
header("Location:/index.php");
?>