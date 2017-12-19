<?php
    class Categoria {
        private $id;
        private $nome;         
    

        function getId() {
            return $this->id;
        }

        function setId($id) {
            $this->id = $id;
        }
        
        function getNome() {
            return $this->nome;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function toJSON(){
            $dto = new stdClass();
            $dto->id = $this->id;
            $dto->nome = $this->nome;
            return $dto;
        }
    }
?>