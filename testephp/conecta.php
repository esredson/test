<?php
$user = ini_get("mysqli.default_user");
$host = ini_get("mysqli.default_host");
$pw = ini_get("mysqli.default_pw");
$conexao=mysqli_connect($host, $user, $pw, "loja");
?>