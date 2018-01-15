<?php
    require_once("../autenticacao/verificar.php");
    require_once('../categoria/Categoria.php');
    require_once('../produto/Produto.php');
    require_once('../produto/ProdutoDao.php');
    $produto = new Produto();
    $produto->setCategoria((new Categoria())->setId($_REQUEST["categoria_id"]));
    $produto->setId(isset($_REQUEST["id"]) ? $_REQUEST["id"] : null);
    $produto->setNome($_REQUEST["nome"]);
    $produto->setPreco($_REQUEST["preco"]); 
    $produto->setDescricao($_REQUEST["descricao"]);
    $produto->setUsado(array_key_exists("usado",$_REQUEST));
    (new ProdutoDao())->inserir($produto);
    header("Location:produto_listar.php");
?>