<?php
    require_once("../autenticacao/verificar.php");
    $titulo="Usuários";
    require_once("../cabecalho.php");
    require_once('Usuario.php');
    require_once('../db/DaoFactory.php');
    $usuarios=DaoFactory::get()->dao()->listar(new Usuario());
?>
<h1 class="text-center"><?=$titulo?></h1>

<table class="table table-hover">
    <tr>
        <th style="width: 10%">Id</th>
        <th style="width: 70%">Login</th>
        <th style="width: 10%"></th>
        <th style="width: 10%"></th>
    </tr>
    <?php foreach($usuarios as $usuario) { ?>
        <tr>
            <td><?=$usuario->getId()?></td>
            <td><?=$usuario->getLogin()?></td>       
            <td>
                <form method="Post" action="usuario_remover_gravar.php">
                    <input type="hidden" name="id" value="<?=$usuario->getId()?>">
                    <input type="submit" class="btn btn-danger" value="Remover">
                </form>
            </td>
            <td><a class="btn btn-primary" href="usuario_editar.php?id=<?=$usuario->getId()?>">Alterar</a></td>
        </tr>
    <?php } ?>
</table>

<a class="btn btn-primary" href="usuario_editar.php">Incluir</a>

<?php require_once("../rodape.php"); ?>