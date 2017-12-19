<?php 
    define("TITLE","minha loja")
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/loja.css" />
    <title><?=$title ? $title : TITLE ?> </title> 
</head>
<body>
    <main class="container">
    <div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Minha Loja</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="formulario-produto.php">Adiciona Produto</a></li>
                <li><a href="produto-lista.php">Lista</a></li>
            </ul>
        </div>
    </div>
</div>
</body>