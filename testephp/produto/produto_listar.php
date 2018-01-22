<?php
    require_once("../autenticacao/verificar.php");
    $titulo="Produtos";
    require_once("../cabecalho.php");
    require_once('Produto.php');
    require_once('../db/DaoFactory.php');
    $produtos=DaoFactory::get()->dao()->listar(new produto());
?>
<h1 class="text-center"><?=$titulo?></h1>

<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descriçao</th>
        <th>Usado</th>
        <th>Categoria</th>
        <th>ISBN</th>
        <th>Imposto</th>
        <th>Preço com desconto</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($produtos as $produto) { ?>
        <tr>
            <td><?=$produto->getId()?></td>
            <td><?=$produto->getNome()?></td>
            <td><?=$produto->getPreco()?></td>
            <td class="descricao" title="<?=$produto->getDescricao()?>"><?=$produto->getDescricao()?></td>  
            <td><span class="<?=$produto->isUsado() ? "glyphicon glyphicon-ok-sign" : ""?>"></span></td>  
            <td><?=$produto->getCategoria()->getNome()?></td>       
            <td><?=$produto->temIsbn() ? $produto->getIsbn() : ""?></td> 
            <td><?=$produto->calculaImposto() ?></td>          
            <td><?=$produto->getPrecoComDesconto() ?></td>          
            <td>
                <form method="Post" action="produto_remover_gravar.php">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>">
                    <input type="submit" class="btn btn-danger" value="Remover">
                </form>
            </td>
            <td><a class="btn btn-primary" href="produto_editar.php?id=<?=$produto->getId()?>">Alterar</a></td>
        </tr>
    <?php } ?>
</table>

<a class="btn btn-primary" href="produto_editar.php">Incluir</a>

<?php require_once("../rodape.php"); ?>