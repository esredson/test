<?php
    class Categoria {
        private $id;
        private $nome;         

        function getId() {
            return $this->id;
        }

        function setId($id) {
            $this->id = $id;
            return $this;
        }
        
        function getNome() {
            return $this->nome;
        }

        function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }

        function toJSON(){
            $dto = new stdClass();
            $dto->id = $this->id;
            $dto->nome = $this->nome;
            return $dto;
        }
    }
?>