function abrirRegistroLivro(){
	var livro = document.getElementById("botao-livro");
	var autor = document.getElementById("botao-autor");
	if(livro.style.display == 'none' || livro.style.display == ''){
		livro.style.display = 'flex';
		autor.style.display = 'none';
	}
	else {
		livro.style.display = 'none';
	}
}

function abrirRegistroAutor(){
	var livro = document.getElementById("botao-livro");
	var autor = document.getElementById("botao-autor");
	if(autor.style.display == 'none' || autor.style.display == ''){
		autor.style.display = 'flex';
		livro.style.display = 'none';
	}
	else {
		autor.style.display = 'none';
	}
}

function alerta() {
	alert("Cadastro Salvo com Sucesso!");
}