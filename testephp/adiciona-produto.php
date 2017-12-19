<?php
    require_once("logica-usuario.php") ;
    verificaUsuario();
    $title="Resposta";
    require_once("cabecalho.php");
    require_once("conecta.php");  
    require_once("autoload.php");        
    $dao = new ProdutoDao($conexao);
    $produto = null;
    if (strcasecmp($_REQUEST["tipoProduto"], "livro") == 0) {
        $produto = new Livro();
        $produto->setIsbn($_REQUEST["isbn"]);
    } else {
        $produto = new Produto();
    }
    $categoria = new Categoria();
    $categoria->setId($_REQUEST["categoria_id"]); 
    $produto->setNome($_REQUEST["nome"]);
    $produto->setPreco($_REQUEST["preco"]);  
    $produto->setDescricao($_REQUEST["descricao"]); 
    $produto->setCategoria($categoria);        
    $produto->setUsado(array_key_exists("usado",$_REQUEST)?"true":"false");
     
    
    if ($dao->insere($produto)) {
    ?>    
    <p class="alert alert-info">Produto <?=$produto->getNome() ?> adicionado com sucesso</p>
    <?php
    } else {         
    ?>
    <p class="alert danger">Nao foi possível realizar a operaçao: </p>      
<?php
    }
    require_once("rodape.php"); 
?>
