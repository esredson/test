<?php
    require_once("../produto/Produto.php");
    require_once("../db/DaoFactory.php");
    DaoFactory::get()->dao()->remover((new Produto())->setId($_REQUEST["id"]));
    header("Location:produto_listar.php");
?>