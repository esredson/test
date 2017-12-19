<?php
    require_once("conecta.php"); 
    require_once("banco_usuario.php");
    $id=$_REQUEST["id"];    
    
    header("Location:usuario-lista.php?remove=true");
    removeUsuario($conexao,$id);
    die();
    
?>
