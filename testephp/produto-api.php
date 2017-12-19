<?php
require_once("autoload.php");
require_once("conecta.php");
$dao = new ProdutoDao($conexao);
$produtos = $dao->lista();
header("content-type: application/json");
$produtosJSON = array();
foreach($produtos as $produto) {
    array_push($produtosJSON, $produto->toJSON());
}
echo json_encode($produtosJSON);
?>