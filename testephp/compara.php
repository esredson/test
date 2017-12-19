<?php
    require_once("produto.php");

    $produto = new Produto();
    $produto->setPreco(59.90);

    $outroProduto = new Produto();
    $outroProduto->setPreco(59.90);

    if($produto === $outroProduto){
        echo "sao iguais";        
    } else {
        echo "sao diferentes";
    }
    


?>