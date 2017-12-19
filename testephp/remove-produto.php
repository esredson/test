<?php
    require_once("conecta.php");
    require_once("autoload.php");       
    $id=$_REQUEST["id"];    
    
    header("Location:produto-lista.php?remove=true");
    (new ProdutoDao($conexao))->remove($id);
    die();


     
?>
