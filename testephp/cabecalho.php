<?php 
    define("TITLE","minha loja")
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="/static/css/bootstrap.css" />
    <link rel="stylesheet" href="/static/css/loja.css" />
    <title><?=isset($titulo) ? $titulo : TITLE ?> </title> 
</head>
<body>
    <main class="container">
    <div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">Minha Loja</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/produto/produto_listar.php">Produtos</a></li>
                <li><a href="/categoria/categoria_listar.php">Categorias</a></li>
                <li><a href="/usuario/usuario_listar.php">Usuários</a></li>
            </ul>
        </div>
    </div>
</div>
</body>