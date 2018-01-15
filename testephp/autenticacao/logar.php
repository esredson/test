<?php require_once("../cabecalho.php"); ?>

<form action="logar_gravar.php" method="post">
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

<?php require_once("../rodape.php"); ?>