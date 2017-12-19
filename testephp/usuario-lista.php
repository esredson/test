<?php   
    $title="Lista";
    require_once("cabecalho.php");
    require_once("conecta.php");
    require_once("banco_usuario.php");
    $usuarios=listaUsuarios($conexao);
?>
<h1 class="text-center">Listagem</h1>
<?php    
   if(array_key_exists("remove",$_GET) && $_GET["remove"]=="true") {
    ?> 
    <p class="alert alert-success">Usuario removido com sucesso</p>
<?php 
   }   
?>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Login</th>         
        <th></th>
    </tr>
    <?php   
        foreach($usuarios as $usuario) {     
    ?>
    <tr>
        <td><?=$usuario["id"]?></td>
        <td><?=$usuario["login"]?></td>                        
        <td><form method="Post" action="remove-usuario.php">
           <input type="hidden" name="id" value="<?=$usuario["id"]?>">
           <input type="submit" class="btn btn-danger" value="Remover">
        </form></td>
          
    </tr>

    <?php } ?>

</table>
<script src="js/confirma.js"></script>
<?php
    require_once("rodape.php")
?>