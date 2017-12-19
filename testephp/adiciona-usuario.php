<?php
    require_once("logica-usuario.php") ;
    verificaUsuario();
    $title="Resposta";
    require_once("cabecalho.php");
    require_once("conecta.php");    
    require_once("banco_usuario.php");
    $login=$_REQUEST["login"];
    $senha=$_REQUEST["senha"]; 
    
    if (insereUsuario($conexao,$login,$senha)) {
    ?>    
     header("Location:formulario-usuario.php");
    <?php
    } else {         
    ?>
    <p class="alert danger">Nao foi possível realizar a operaçao: </p>      
<?php
    }
    require_once("rodape.php");     
?>
