<?php
class RegistraUsuario {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function addUserAdmin() {
		$nome = 'Estoque';
		$email = 'admin@gmail.com';
		$senha = md5('admin');
		$permissoes = 'ADD,EDIT';
		$sql = "INSERT INTO usuarios (nome, email, senha, permissoes) VALUES (:nome, :email, :senha, :permissoes)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->bindValue(':permissoes', $permissoes);
		$sql->execute();

		return true;
	}

	public function addUserEstoque() {
		$nome = 'Estoque';
		$email = 'estoque@gmail.com';
		$senha = md5('estoque');
		$permissoes = 'ADD';
		$sql = "INSERT INTO usuarios (nome, email, senha, permissoes) VALUES (:nome, :email, :senha, :permissoes)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->bindValue(':permissoes', $permissoes);
		$sql->execute();

		return true;
	}

}