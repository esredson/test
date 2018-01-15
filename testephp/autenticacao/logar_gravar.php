<?php
require_once("Autenticacao.php");
require_once("../usuario/Usuario.php");
(new Autenticacao())->logar(new Usuario($_REQUEST['login'], $_REQUEST['senha']));
?>