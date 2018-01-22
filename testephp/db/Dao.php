<?php
abstract class Dao{
    abstract function gravar($o);
    abstract function listar($o);
    abstract function buscarUm($o);
    abstract function remover($o);
}
?>