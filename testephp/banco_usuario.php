<?php
function buscaUsuario($conexao,$login,$senha){
    $login=mysqli_real_escape_string($conexao,$login);
    $senha=mysqli_real_escape_string($conexao,$senha);
    $senhaMD5=md5($senha);
    $query="SELECT * FROM usuarios WHERE login='{$login}'AND senha='{$senhaMD5}'";
    $dado=mysqli_query($conexao,$query);
    $usuario=mysqli_fetch_assoc($dado);
    error_log(mysqli_error($conexao));
    return $usuario;
}
function insereUsuario($conexao,$login,$senha){
    $senhaMD5=md5($senha);
    $query="INSERT INTO usuarios(login,senha) VALUES ('{$login}','{$senhaMD5}')";
    $retorno=mysqli_query($conexao,$query);
    error_log(mysqli_error($conexao));
    return $retorno;
} 

function listaUsuarios($conexao){
    $query="SELECT * FROM usuarios";
    $usuarios=array();
    $dados=mysqli_query($conexao,$query);
    while($usuario=mysqli_fetch_assoc($dados)){
        array_push($usuarios,$usuario);
    }
    return $usuarios;

function removeUsuario($conexao,$id){
    $query="DELETE FROM usuarios where id={$id}";
    $retorno=mysqli_query($conexao,$query);
    error_log(mysqli_error($conexao));
    return $retorno;
}

}

 
?>