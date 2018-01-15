<?php
require_once('../DB.php');
require_once('Categoria.php');
class CategoriaDao{
    
    protected $db;
    
    function __construct() {
        $this->db = new DB();
    }

    function listar(){        
        $results = $this->db->select("SELECT * FROM categorias");
        $categorias = array();
        foreach($results as $result) {
            $categoria = new Categoria();
            $categoria->setId($result["id"]);
            $categoria->setNome($result["nome"]);
            $categorias[] = $categoria;
        }
        return $categorias;
    }
}
?>