<?php

require_once("config.php");

// $sql = new Sql();
// $usuarios = $sql->select("SELECT * FROM tb_usuarios");
// echo json_encode($usuarios);

//carrega um usuario
// $root = new Usuario();
// $root->loadById(3);
// echo $root;

//carrega uma lista de usuarios
// $lista = Usuario::getList();
// echo json_encode($lista);

// carrega uma lista de usuarios buscando pelo login
// $search = Usuario::getSearch("jo");
// echo json_encode($search);

//carrega um usuario usando o login e a senha
// $usuario = new Usuario();
// $usuario->login("joao","qwerty");
// echo $usuario

//criando um novo usuario no banco
// $aluno = new Usuario("aluno", "1@auno");
// $aluno->insert();
// echo $aluno

// atualizando o registro de uma informação na tabela
$usuario = new Usuario();
$usuario->loadById(3);
$usuario->update("professor", "@dlaksj09");
echo $usuario;
?>