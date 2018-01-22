<?php
    require_once("../autenticacao/verificar.php");
    $titulo="Categorias";
    require_once("../cabecalho.php");
    require_once('Categoria.php');
    require_once('../db/DaoFactory.php');
    $categorias=DaoFactory::get()->dao()->listar(new Categoria());
?>
<h1 class="text-center"><?=$titulo?></h1>

<table class="table table-hover">
    <tr>
        <th style="width: 10%">Id</th>
        <th style="width: 70%">Nome</th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
    </tr>
    <?php foreach($categorias as $categoria) { ?>
        <tr>
            <td><?=$categoria->getId()?></td>
            <td><?=$categoria->getNome()?></td>       
            <td>
                <form method="Post" action="categoria_remover_gravar.php">
                    <input type="hidden" name="id" value="<?=$categoria->getId()?>">
                    <input type="submit" class="btn btn-danger" value="Remover">
                </form>
            </td>
            <td><a class="btn btn-primary" href="categoria_editar.php?id=<?=$categoria->getId()?>">Alterar</a></td>
        </tr>
    <?php } ?>
</table>

<a class="btn btn-primary" href="categoria_editar.php">Incluir</a>

<?php require_once("../rodape.php"); ?>