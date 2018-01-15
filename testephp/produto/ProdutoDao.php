<?php
require_once('../DB.php');
require_once('Produto.php');
require_once('../categoria/Categoria.php');

class ProdutoDao{ 

    protected $db;
    
    function __construct() {
        $this->db = new DB();
    }

    function inserir($prod) {
        if (null === $prod->getId()) {
            $this->db->query("INSERT INTO produtos(nome,preco,descricao,categoria_id,usado) VALUES ('{$prod->getNome()}','{$prod->getPreco()}','{$prod->getDescricao()}','{$prod->getCategoria()->getId()}','{$prod->isUsado()}')");
        } else {
            $this->db->query("UPDATE produtos set nome = '{$prod->getNome()}', preco = '{$prod->getPreco()}', descricao = '{$prod->getDescricao()}', categoria_id = '{$prod->getCategoria()->getId()}', usado = '{$prod->isUsado()}' where id='{$prod->getid()}'");
        }
    }

    function buscar($id) {
        $result = $this->db->first("SELECT p.id, p.nome, p.preco, p.descricao, p.usado, c.id as categoria_id, c.nome as categoria_nome FROM produtos p inner join categorias c on p.categoria_id = c.id where p.id={$id}");
        $produto = new produto();
        $produto->setId($result["id"]);
        $produto->setNome($result["nome"]);
        $produto->setPreco($result["preco"]);
        $produto->setDescricao($result["descricao"]);
        $produto->setUsado($result["usado"]);
        $categoria = new Categoria();
        $categoria->setId($result["categoria_id"]);
        $categoria->setNome($result["categoria_nome"]);
        $produto->setCategoria($categoria);
        return $produto;
    }

    function listar(){
        $results = $this->db->select("SELECT p.id, p.nome, p.preco, p.descricao, p.usado, c.nome as categoria_nome FROM produtos p inner join categorias c on p.categoria_id = c.id");
        $produtos = array();
        foreach($results as $result) {
            $produto = new produto();
            $produto->setId($result["id"]);
            $produto->setNome($result["nome"]);
            $produto->setPreco($result["preco"]);
            $produto->setDescricao($result["descricao"]);
            $produto->setUsado($result["usado"]);
            $categoria = new Categoria();
            $categoria->setNome($result["categoria_nome"]);
            $produto->setCategoria($categoria);
            $produtos[] = $produto;
        }
        return $produtos;
    }

    function remover($id){
        $this->db->query("DELETE FROM produtos where id={$id}");
    }
}
?>