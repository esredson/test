<?php

require_once("autoload.php");
class CategoriaDao{ 
    
    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    function listaCategorias(){
        $query="SELECT * FROM categorias";
        $categorias=array();
        $dados=mysqli_query($this->conexao,$query);
        while($retorno=mysqli_fetch_assoc($dados)){
            $categoria = new Categoria();
            $categoria->setId($retorno["id"]);
            $categoria->setNome($retorno["nome"]);
            array_push($categorias,$categoria);
        }
        return $categorias;

    }
}
?>