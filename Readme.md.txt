 *************************************************************
* ferramentas, arquivos, extensões e etc, usadas no Sistema   *
 *************************************************************
- pdo para salvar no banco de dados no MySQL gerenciando pelo phpMyAdmin
- mysqli para salvar o arquivo de imagem no banco também
- não usei php 7, pois não tenho conhecimentos ainda, mas para aprender não sera um problema
- usei no sistema inteiro php orientado ao objeto
- usei html, css, javascript, Bootstrap, Wampserver para usar como servidor local

 *****************************************
* tomadas de decisao e demais descrições  *
 *****************************************
 - criei uma pasta assets, onde se encontra as pastas de css, imagens e o javascript
 - criei uma pasta classes, para guardar as classes criadas para usar no sistema, para deixar organizado
 - criei uma pasta chamada upload, onde sera armazenado o arquivo (capa do livro)
 - criei uma pasta Sql do banco, onde guardei o sql do banco usado
 - e os outros arquivos seriam os codigos de php mesmo

 ***********
 meu arquivo inicial seria o index.php, mas para acessa-lo teria que estar logado, entretando criei como foi pedido um usuario do tipo admin, que teria privilegios, ou seja teria acesso a tudo, e o estoque que teria acesso a tudo com restrição

 o usuario do tipo estoque não podera adicionar um novo autor, somente um existente.

 Para fazer isso criei a classe usuarios.class.php, onde la se encontra a maioria das conexões com o bancos e funções, como fazer o login, selecionado e adicionando no banco e permissoes dos usuarios, o admin e o estoque

 criei outra classe registrausuario.class.php, como foi pedido para enserir os usuarios no banco, entretanto no banco ja consta os usuarios.
 	para usar a classe registrausuario.class.php seria somente instanciar ela no login.php, que automaticamente adionara os usuarios, mas não sera necessario, pois como falei os usuarios ja constam no banco que salvei.

 o arquivo conexao.php seria a conexao com o mysqli para salvar a imagem no banco e o config.php seria para conexao usando pdo, que por sua vez usado para praticamente o sistema todo.

 criei o deslogar.php, para deslogar a conta em sessao atual.

 não consegui tempo para finalizar uma parte, onde teria que associar os livros cadastrados com os autores, devido essa semana estar corrida para mim onde tive que estudar para prova da faculdade tambem.

 Gostaria muito de poder estagiar no colegio interativo, na vaga proposta, tenho muito vontade de aprender, gosto de codar, dediquei nesse projeto para deixar da melhor maneira possivel, mesmo sem tempo.


 	 
