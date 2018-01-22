<?php
    require_once("../usuario/Usuario.php");
    require_once("../db/DaoFactory.php");
    DaoFactory::get()->dao()->remover((new Usuario())->setId($_REQUEST["id"]));
    header("Location:usuario_listar.php");
?>