
<?php   
    $title="Lista";
    require_once("cabecalho.php");
    require_once("conecta.php"); 
    require_once("autoload.php");       
    $produtos=(new ProdutoDao($conexao))->lista();
?>
<h1 class="text-center">Listagem</h1>
<?php    
   if(array_key_exists("remove",$_GET) && $_GET["remove"]=="true") {
    ?> 
    <p class="alert alert-success">Produto removido com sucesso</p>
<?php 
   }   
?>
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
    <?php   
        foreach($produtos as $produto) {     
    ?>
    <tr data-pid="<?=$produto->getId()?>">
        <td><?=$produto->getId()?></td>
        <td><?=$produto->getNome()?></td>
        <td><?=$produto->getPreco()?></td>
        <td class="descricao" title="<?=$produto->getDescricao()?>"><?=$produto->getDescricao()?></td>  
        <td><span class="<?=$produto->getUsado() ? "glyphicon glyphicon-ok-sign" : ""?>"></span></td>  
        <td><?=$produto->getCategoria()->getNome()?></td>       
        <td><?=$produto->temIsbn() ? $produto->getIsbn() : ""?></td> 
        <td><?=$produto->calculaImposto() ?></td>          
        <td><?=$produto->getPrecoComDesconto() ?></td>          
        <td class="col-remove"><form method="Post" action="remove-produto.php">
           <input type="hidden" name="id" value="<?=$produto->getId()?>">
           <input type="submit" class="btn btn-danger" value="Remover">
        </form></td>
        <td><form method="Post" action="formulario-produto.php">
           <input type="hidden" name="id" value="<?=$produto->getId()?>">
           <input type="submit" class="btn btn-primary" value="Alterar">
        </form></td>
          
    </tr>

    <?php } ?>

</table>
<script src="js/confirma.js"></script>

<?php
    require_once("rodape.php")
?>