<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'conexao.php';

if(!isset($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de biblioteca</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/template.css">
	<script type="text/javascript" src="assets/js/script.js"></script> 	
</head>
<body>
	<div class="container-fluid">	
		<h1 style="margin-top:15px;">Sistema de Biblioteca</h1><br/><br/>
		<div class="box-registro">

			<?php if($usuarios->temPermissao('ADDLIVRO')): ?>
			<input type="submit" class="botao-livro" value="Registro de livro" onclick="abrirRegistroLivro()" />
			<?php endif; ?>

			<?php if($usuarios->temPermissao('ADDAUTOR')): ?>
			<input type="submit" class="botao-autor" value="Registro de Autor" onclick="abrirRegistroAutor()" />
			<?php endif; ?>
		</div>	
		<div class="livro-autor">					
			<div class="box" id="botao-livro">
				<h2 class="titulo-inserir">Registrar um livro</h2></br>
				<form method="POST" action="addlivro.php" enctype="multipart/form-data">
					<div class="flex">
						<table>
							<tr class="espaco-linha">
								<td>
									<label class="font">Titulo: </label>
								</td>
								<td>
									<input type="text" class="form-control estilo-input" name="titulo" placeholder="Digite o Titulo" autocomplete="disabled">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Titulo Original: 
									</label>
								</td>
								<td>
									<input type="text" class="form-control estilo-input" name="titulo_original" placeholder="Digite o Titulo Original" autocomplete="disabled">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Gênero: </label>
								</td>
								<td>
									<input type="text" class="form-control estilo-input" name="genero" placeholder="Digite o Gênero" autocomplete="disabled">
								</td>
							</tr>					

							<tr class="espaco-linha">
								<td>
									<label class="font">Autores: 
									</label>
								</td>
								<td>
									<select name="autores" class=" form-control estilo-select">
										<option  value="" disabled selected>Selecione um autor</option>
										<?php
										$sql = "SELECT * FROM livros";
										$sql = $pdo->query($sql);

										if($sql->rowCount() > 0){
											foreach ($sql->fetchAll()  as $autor):
												echo '<option  value="'.$autor['autores'].'">'.$autor['autores'].'</option>';
											endforeach;
										}
										?>										
									</select>
								</td>
								
							</tr>

							<?php if($usuarios->temPermissao('ADDAUTOR')): ?>
							<tr>
								<td>
									<label class="font">Add:</label>
								</td>
								<td>
									<input type="text" class="form-control estilo-input" name="autores" placeholder="Informe o novo autor" autocomplete="disabled">
								</td>								
							</tr>
							<?php endif; ?> 

							<tr class="espaco-linha">
								<td>
									<label class="font">Foto de capa:</label>
								</td>
								<td>
									<input type="file" required name="arquivo">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Ano:</label>
								</td>
								<td>
									<input type="date" class="form-control estilo-number" name="ano_lancamento" placeholder="Ano de lançamento" >
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Editora:</label>
								</td>
								<td>
									<input type="text" class="form-control estilo-number" name="editora" placeholder="Informe a Editora" >
								</td>
							</tr>							

							<tr class="espaco-linha">
								<td>
									<label class="font">Volume: </label>
								</td>
								<td>
									<input type="number" class="form-control estilo-input" name="volume" placeholder="Digite o volume do livro">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Edição: </label>
								</td>
								<td>
									<input type="number" class="form-control estilo-input" name="edicao" placeholder="Digite a edição">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Avaliação: </label>
								</td>
								<td>
									<select required name="avaliacao" class=" form-control estilo-select">
				  						<option  value="" disabled selected>Selecione um autor</option>
				  						<option  value="1">1 estrela</option>
				  						<option  value="2">2 estrela</option>
				  						<option  value="3">3 estrela</option> 
				  						<option  value="4">4 estrela</option> 
				  						<option  value="5">5 estrela</option>  
									</select>
								</td>
							</tr> 
								
						</table>
						</div>
						<div class="box-salvar">
							<input type="submit" class="botao-salvar" value="Salvar" onclick="alerta()" />
							<input type="button" class="botao-sair" value="Sair" onclick="location.href='deslogar.php'" />
						</div>				
					</div>
				</form>			
			</div>
			<!-- segundo box -->
			<div class="box" id="botao-autor">
				<h2 class="titulo-inserir">Registrar um Autor</h2></br>
				<form method="POST" action="addautor.php">
					<div class="flex">
						<table>
							<tr class="espaco-linha">
								<td>
									<label class="font">Nome: </label>
								</td>
								<td>
									<input type="text" class="form-control estilo-input" name="nome" placeholder="Digite o nome do autor" autocomplete="disabled">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Data de nascimento: 
									</label>
								</td>
								<td>
									<input type="date" class="form-control estilo-input" name="data_nascimento" placeholder="Digite a data de nascimento" autocomplete="disabled">
								</td>
							</tr>

							<tr class="espaco-linha">
								<td>
									<label class="font">Nacionalidade: </label>
								</td>
								<td>
									<input type="text" class="form-control estilo-input" name="nacionalidade" placeholder="Informe a Nacionalidade" autocomplete="disabled">
								</td>
							</tr>
							<tr class="espaco-linha">
								<td>
									<label class="font">Biografia: </label>
								</td>
								<td>
									<textarea name="biografia" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Biografia..." name="biografia"></textarea>								
								</td>
							</tr>		

						</table>
						</div>
						<div class="box-salvar">
							<input type="submit" class="botao-salvar" value="Salvar" onclick="alerta()" />
							<input type="button" class="botao-sair" value="Sair" onclick="location.href='deslogar.php'" />
						</div>				
					</div>
				</form>			
			</div>		
		</div>
	</div>	
</body>
</html> 


