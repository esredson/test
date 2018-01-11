<?php
require_once("logica-usuario.php") ;
require_once("conecta.php");    
require_once("banco_usuario.php");
$login=$_REQUEST["login"];
$senha=$_REQUEST["senha"];  

$usuario = buscaUsuario($conexao,$login,$senha);
if($usuario != null){
    logaUsuario($usuario);
    //setcookie("usuario_logado",$usuario['login']);

}

header("Location:index.php");

?>