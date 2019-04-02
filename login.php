<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'classes/registrausuario.class.php';

if(!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);


	$usuarios = new Usuarios($pdo);

	if($usuarios->fazerLogin($email, $senha)){
		header('Location: index.php');
		exit;
	}
	else {
		echo "Usuario e/ou senha estao incorretos!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=0">
	<title>Cadastro de Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="assets/css/template.css">
	<script type="text/javascript" src="assets/js/script.js"></script> 	
</head>
<body>	
	<div class="fundo">
		<form method="POST" class ="login">				
			<input type="email" name="email" autocomplete="teste" placeholder="username" autofocus=""  class="email" ></br>
			<input type="password" name="senha" placeholder="senha"  class="email" >
			<input type="submit" value="LOGIN" class="botao-logar">	
		</form>
	</div>	
</body>
</html> 