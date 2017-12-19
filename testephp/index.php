
<?php 
require_once("logica-usuario.php") ;
require_once("cabecalho.php") ;
if(usuarioEstaLogado()){ 
?>

 <p class="alert alert-success text-center">Logado como <?=usuarioLogado()?></p>
 <p class="text-center"> 
    <a href="logout.php"> Deslogar</a></p>
 <?php 
} else {
?>
 <form action="login.php" method="post">
    <div class="form-group">
        <label>Login:</label>
        <input class="form-control" type="text" name="login" autofocus>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input class="form-control" type="password" name="senha">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
 </form>
 
<?php 
}
require_once("rodape.php") ?>