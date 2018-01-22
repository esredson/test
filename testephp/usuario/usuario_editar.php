<?php   
    require_once("../autenticacao/verificar.php");
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
    $titulo = is_null($id) ? "Novo Usuário" : "Alterar Usuário";
    require_once("../cabecalho.php");
    require_once('Usuario.php');
    require_once('../db/DaoFactory.php');

    $usuario=is_null($id) ? new Usuario() : DaoFactory::get()->dao()->buscarUm((new Usuario())->setId($id));
?>
   
<h1 class="text-center"><?=$titulo ?></h1>
 
<form method="Post" action="usuario_editar_gravar.php">
    <input type="hidden" name="id" value="<?=$id?>">

    <div class="form-group">
        <label>Login:</label>
        <input type="text" name="login" class="form-control" value="<?=$usuario->getLogin()?>" autofocus>
    </div>

    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="senha" class="form-control" value="" autofocus>
    </div>
    
    <input type="submit" value="Salvar" class="btn btn-primary">
</form>
<?php
    require_once("../rodape.php")
?>