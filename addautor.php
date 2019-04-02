<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$data_nascimento = addslashes($_POST['data_nascimento']);
		$nacionalidade = addslashes($_POST['nacionalidade']);
		$biografia = addslashes($_POST['biografia']);
		
		$usuarios = new Usuarios($pdo);

		$usuarios->addAutor($nome, $data_nascimento, $nacionalidade, $biografia);

		header('Location: index.php');
		exit;
		

	}