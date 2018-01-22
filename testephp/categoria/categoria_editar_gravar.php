<?php
    require_once("../autenticacao/verificar.php");
    require_once('../categoria/Categoria.php');
    require_once('../db/DaoFactory.php');
    $categoria = new Categoria();
    $categoria->setId(isset($_REQUEST["id"]) ? $_REQUEST["id"] : null);
    $categoria->setNome($_REQUEST["nome"]);
    DaoFactory::get()->dao()->gravar($categoria);
    header("Location:categoria_listar.php");
?>