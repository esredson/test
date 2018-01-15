<?php
require_once('Autenticacao.php');
if (!(new Autenticacao())->verificarSeEstahLogado()) {
    header("Location:/autenticacao/logar.php");
    exit();
}
?>