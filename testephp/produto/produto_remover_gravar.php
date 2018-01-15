<?php
    require_once("produtoDao.php");
    (new ProdutoDao())->remover($_REQUEST["id"]);
    header("Location:produto_listar.php");     
?>