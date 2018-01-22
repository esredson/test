<?php
    require_once("../categoria/Categoria.php");
    require_once("../db/DaoFactory.php");
    DaoFactory::get()->dao()->remover((new Categoria())->setId($_REQUEST["id"]));
    header("Location:categoria_listar.php");
?>