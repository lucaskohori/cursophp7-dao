<?php

require_once("config.php");
/* CARREGA APENAS UM USUARIO DA TABELA
$jose = new Usuario();

$jose->loadById(5);

echo $jose;*/

///////////////////////////////////////

/* CARREGA TODOS OS USUARIOS DA TABELA!!
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

////////////////////////////////////

//CARREGA UMA LISTA DE USUARIOS
/*
$lista = Usuario::getList();

echo json_encode($lista);*/

////////////////////////////////////
//CARREGA UMA LISTA DE USUÁRIOS ORDENADO PELO LOGIN
/*
$search = Usuario::search("r");

echo json_encode($search);*/

//CARREGA UM USUÁRIO USANDO O LOGIN E A SENHA
/*
$usuario = new Usuario();
$usuario->login("root", "!@#$");

echo $usuario;*/

///////////////////////////////////////
//ADICIONA DADOS NA TABELA
/*
$aluno = new Usuario("João", "5214");

$aluno->insert();

echo $aluno;*/

////////////////////////////////////
//ATUALIZA DADOS DO BANCO DE DADOS

$usuario = new Usuario();

$usuario->loadById(7);

$usuario->update("Rafael", "&@#¨%$");

echo $usuario;

?>