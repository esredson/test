<?php   
    require_once("../autenticacao/verificar.php");
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
    $titulo = is_null($id) ? "Nova Categoria" : "Alterar Categoria";
    require_once("../cabecalho.php");
    require_once('Categoria.php');
    require_once('../db/DaoFactory.php');

    $categoria=is_null($id) ? new Categoria() : DaoFactory::get()->dao()->buscarUm((new Categoria())->setId($id));
?>
   
<h1 class="text-center"><?=$titulo ?></h1>
 
<form method="Post" action="categoria_editar_gravar.php">
    <input type="hidden" name="id" value="<?=$id?>">

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?=$categoria->getNome()?>" autofocus>
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-primary">
</form>
<?php
    require_once("../rodape.php")
?>