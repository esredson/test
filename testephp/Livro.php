<?php
    require_once("autoload.php");

    class Livro extends Produto{
        private $isbn;

        function getIsbn(){
            return $this->isbn;
        }
        
        function setIsbn($isbn) {
            $this->isbn = $isbn;
        }

        function toJSON() {
            $dto = parent::toJSON();
            $dto->isbn = $this->isbn;
            return $dto;
        }
    }
?>