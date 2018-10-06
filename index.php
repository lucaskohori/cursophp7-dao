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

//carrega um usuário usando o login e a senha
$usuario = new Usuario();
$usuario->login("root", "!@#$");

echo $usuario;

?>