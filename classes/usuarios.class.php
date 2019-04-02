<?php
class Usuarios {
	private $pdo;
	private $id;
	private $permissoes;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function fazerLogin($email, $senha) {

		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

			$_SESSION['logado'] = $sql['id'];

			return true;
		}
		return false;
	}

	public function setUsuario($id){

		$this->id = $id;

		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			$this->permissoes = explode(',', $sql['permissoes']);

		}
	}

	public function addLivro($titulo, $titulo_original, $genero, $autores, $ano_lancamento, $editora, $volume, $edicao, $avaliacao){
		$sql = "INSERT INTO livros (titulo, titulo_original, genero, autores, ano_lancamento, editora, volume, edicao, avaliacao) VALUES (:titulo, :titulo_original, :genero, :autores, :ano_lancamento, :editora, :volume, :edicao, :avaliacao)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':titulo', $titulo);
		$sql->bindValue(':titulo_original', $titulo_original);
		$sql->bindValue(':genero', $genero);
		$sql->bindValue(':autores', $autores);
		$sql->bindValue(':ano_lancamento', $ano_lancamento);
		$sql->bindValue(':editora', $editora);
		$sql->bindValue(':volume', $volume);
		$sql->bindValue(':edicao', $edicao);
		$sql->bindValue(':avaliacao', $avaliacao);
		$sql->execute();

		return true;

	}

	public function addAutor($nome, $data_nascimento, $nacionalidade, $biografia) {
		$sql = "INSERT INTO autor (nome, data_nascimento, nacionalidade, biografia) VALUES (:nome, :data_nascimento, :nacionalidade, :biografia)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':data_nascimento', $data_nascimento);
		$sql->bindValue(':nacionalidade', $nacionalidade);
		$sql->bindValue(':biografia', $biografia);		
		$sql->execute();

		return true;
	}

	public function getPermissoes(){
		return $this->permissoes;
	}

	public function temPermissao($p) {
		if(in_array($p, $this->permissoes)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getAll() {
		$sql = "SELECT * FROM livros";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		}
		else {
			return array();
		}
	}

}