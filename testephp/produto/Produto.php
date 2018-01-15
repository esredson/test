<?php
    class Produto {
        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $usado;
        private $categoria;
    

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

        function getPreco() {
            return $this->preco;
        }

        function setPreco($preco) {
            $this->preco = $preco;
            return $this;
        }

        function getDescricao() {
            return $this->descricao;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
            return $this;
        }

        function isUsado() {
            return $this->usado;
        }

        function setUsado($usado) {
            $this->usado = $usado ? 1 : 0;
            return $this;
        }

        function getCategoria() {
            return $this->categoria;
        }

        function setCategoria($categoria) {
            $this->categoria = $categoria;
            return $this;
        }

        function temIsbn(){
            return $this instanceof Livro;
        }

        function calculaImposto() {
            return $this->preco * 0.2;
        }

        function getPrecoComDesconto ($desconto = 10) {
            return $this->preco - $this->preco*($desconto/100);
        }

        function toJSON(){
            $dto = new stdClass();
            $dto->id = $this->id;
            $dto->nome = $this->nome;
            $dto->preco = $this->preco;
            $dto->descricao = $this->descricao;
            $dto->usado = $this->usado;
            $dto->categoria = $this->categoria->toJSON();
            return $dto;
        }

    }

?>