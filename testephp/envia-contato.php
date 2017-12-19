<?php

	$nome = $_POST['nome'];
	$email= $_POST['email'];
	$mensagem = $_POST['mensagem'];

    $to = "webmaster@example.com";
    $subject = "E-mail de contato";
    $headers = "From: ${$email} \r\n CC: ${$to}";

    mail($to, $subject, $mensagem, $headers);
?>