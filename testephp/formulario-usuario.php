<?php   
    require_once("logica-usuario.php") ;
    verificaUsuario();
    
    $title="Formulario Usuario";
    require_once("cabecalho.php");    
    require_once("conecta.php");        
?>
<h1 class="text-center">Formulário de Usuario</h1>
<form action="adiciona-usuario.php" method="post">
<div class="form-group">
    <label>Login:</label>
    <input class="form-control" type="text" name="login" autofocus>
</div>
<div class="form-group">
    <label>Senha:</label>
    <input class="form-control" type="password" name="senha">
</div> 
<input type="submit" value="Cadastrar" class="btn btn-primary">
</form>
<?php
    require_once("rodape.php")
?>