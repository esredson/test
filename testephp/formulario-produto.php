<?php   
    require_once("logica-usuario.php") ;
    require_once("autoload.php");  
    verificaUsuario();
    
    $title="Formulario";
    require_once("cabecalho.php");    
    require_once("conecta.php");       
    $produto = new Produto();
    $produto->setCategoria(new Categoria());
    $categorias= (new CategoriaDao($conexao))->listaCategorias();
    $action="adiciona-produto.php";
    $titulo="Inclusao";
    $usado="";
    if(isset($_REQUEST["id"])){
        $action="altera-produto.php";
        $titulo="Alteracao";
        $produto=(new ProdutoDao($conexao))->busca($_REQUEST["id"]);        
        if ($produto->getUsado()){
            $usado="checked";
        }
    }
?>
   
<h1 class="text-center"><?=$titulo?></h1>
 
<form method="Post" action="<?=$action?>">
    <input type="hidden" name="id" value="<?=isset($_REQUEST["id"]) ? $_REQUEST["id"] : "" ?>">

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?=$produto->getNome()?>" autofocus>
    </div>    
    <div class="form-group">
        <label>Preço:</label>
        <input type="text" name="preco" class="form-control" value="<?=$produto->getPreco()?>">
    </div>
    <div class="form-group">
        <label>Descriçao:</label>
        <textarea name="descricao" class="form-control"><?=$produto->getDescricao()?></textarea>
    </div>
    <div class="checkbox">
        <label>
        <input type="checkbox" name="usado" <?=$usado?>>Usado</label>
    </div>
    <div class="form-group">
        <label>Categoria:</label>
        <select class="form-control" name="categoria_id">
            <?php foreach ($categorias as $categoria) { 
                $selected =$produto->getCategoria()->getId() == $categoria->getId()?"selected":"";
            ?>
                <option <?=$selected?> value="<?=$categoria->getId()?>"><?=$categoria->getNome()?></option>
        <?php  } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tipo do Produto:</label>
        <select class="form-control" name="tipoProduto">
            <option value="geral" >Geral</option>
            <option value="livro" <?=$produto->temIsbn() ? "selected" : "" ?>>Livro</option>
        </select>
    </div>
    <div id="isbn" class="form-group">
        <label>ISBN:</label>
        <input type="text" name="isbn" class="form-control" value="<?=$produto->temIsbn() ? $produto->getIsbn() : ""?>">
    </div>
    <script>
        const tipoProduto = document.querySelector("[name='tipoProduto']");
        tipoProduto.onchange = function () {
            const selectedOpt = tipoProduto.options[tipoProduto.selectedIndex].value;
            document.querySelector('#isbn').style.display = selectedOpt === 'geral' ? 'none' : 'block';
        }
        tipoProduto.onchange();
    </script>
    <input type="submit" value="Salvar" class="btn btn-primary">
</form>
<?php
    require_once("rodape.php")
?>