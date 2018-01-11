<?php
    session_start();

   function usuarioEstaLogado(){
        return isset($_SESSION['usuario_logado']);
   }

   function usuarioLogado(){
       return $_SESSION['usuario_logado'];
   }

   function logaUsuario($usuario){
      $_SESSION['usuario_logado']=$usuario['login'];
   }

   function verificaUsuario(){
       if(!usuarioEstaLogado()){
        header("Location:index.php");
        die(); 
       }
   }

   function logout(){
       session_destroy();
       header("Location:index.php");
       die();
   }
?>