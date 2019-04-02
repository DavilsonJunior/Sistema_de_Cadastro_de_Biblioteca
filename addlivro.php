<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'conexao.php';

$msg = false;

	if(isset($_FILES['arquivo'])){

		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));	//pega a extensao do arquivo
		$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
		$diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo

		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

		$sql_code = "INSERT INTO arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";

		if($mysqli->query($sql_code))
			$msg = "Arquivo enviado com sucesso!";
		else
			$msg = "Falha ao enviar arquivo.";
	}

	if(!empty($_POST['titulo']) && !empty($_POST['titulo_original']) && !empty($_POST['genero'])
		&& !empty($_POST['ano_lancamento']) && !empty($_POST['editora']) && !empty($_POST['volume'])
		&& !empty($_POST['edicao']) ) {
		$titulo = addslashes($_POST['titulo']);
		$titulo_original = addslashes($_POST['titulo_original']);
		$genero = addslashes($_POST['genero']);
		$autores = addslashes($_POST['autores']);
		$ano_lancamento = addslashes($_POST['ano_lancamento']);
		$editora = addslashes($_POST['editora']);
		$volume = addslashes($_POST['volume']);
		$edicao = addslashes($_POST['edicao']);
		$avaliacao = addslashes($_POST['avaliacao']);

		$usuarios = new Usuarios($pdo);

		$usuarios->addLivro($titulo, $titulo_original, $genero, $autores, $ano_lancamento, $editora, $volume, $edicao, $avaliacao);

		header('Location: index.php');
		exit;
		

	}
		
	
