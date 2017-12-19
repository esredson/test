<?php
require_once("autoload.php");  

class ProdutoDao{ 

    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    function insere($produto){
        $isbn = $produto->temIsbn() ? $produto->getIsbn() : "";
        $query="INSERT INTO produtos(nome,preco,descricao,categoria_id,usado,isbn) VALUES ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',{$produto->getCategoria()->getId()},{$produto->getUsado()}, '{$isbn}')";
        $retorno=mysqli_query($this->conexao,$query);
        error_log(mysqli_error($this->conexao));
        return $retorno;
    }
    function lista(){
        $query="SELECT p.*, c.nome as categoria_nome FROM produtos as p join categorias as c on p.categoria_id=c.id";
        $produtos=array();
        $dados=mysqli_query($this->conexao,$query);
        while($retorno=mysqli_fetch_assoc($dados)){
            $produto = null;
            if ($retorno["isbn"] != "") {
                $produto = new Livro();
                $produto->setIsbn($retorno["isbn"]);
            } else {
                $produto = new Produto();
            }
            $produto->setId($retorno["id"]);
            $produto->setNome($retorno["nome"]);
            $produto->setPreco($retorno["preco"]);
            $produto->setDescricao($retorno["descricao"]);
            $produto->setUsado($retorno["usado"]);
            $categoria = new Categoria();
            $categoria->setNome($retorno["categoria_nome"]);
            $produto->setCategoria($categoria);
            array_push($produtos,$produto);
        }
        return $produtos;

    }
    function remove($id){
        $query="DELETE FROM produtos where id={$id}";
        $retorno=mysqli_query($this->conexao,$query);
        error_log(mysqli_error($this->conexao));
        return $retorno;
    }

    function altera($produto){
        $isbn = $produto->temIsbn() ? $produto->getIsbn() : "";
        $query="UPDATE produtos set nome='{$produto->getNome()}', 
                preco= {$produto->getPreco()},
                descricao='{$produto->getDescricao()}',
                usado={$produto->getUsado()},
                categoria_id='{$produto->getCategoria()->getId()}',
                isbn='{$isbn}'
                WHERE id={$produto->getId()}";
        $retorno=mysqli_query($this->conexao,$query);
        error_log(mysqli_error($this->conexao));
        return $retorno;
    }

    function busca($id){
        $query="SELECT p.*, c.id as categoria_id, c.nome as categoria_nome FROM produtos as p join categorias as c on p.categoria_id=c.id WHERE p.id={$id}";
        $dados=mysqli_query($this->conexao,$query);
        $array=mysqli_fetch_assoc($dados);
        $produto = null;
        if ($array["isbn"] != "") {
            $produto = new Livro();
            $produto->setIsbn($array["isbn"]);
        } else {
            $produto = new Produto();
        }
        $produto->setId($array["id"]);
        $produto->setNome($array["nome"]);
        $produto->setPreco($array["preco"]);
        $produto->setDescricao($array["descricao"]);
        $produto->setUsado($array["usado"]);
        $categoria = new Categoria();
        $categoria->setId($array["categoria_id"]);
        $categoria->setNome($array["categoria_nome"]);
        $produto->setCategoria($categoria);
        return $produto;
    }
}
?>