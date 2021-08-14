<?php

function getConexao(){
	$conexao = new \PDO("mysql:host=localhost;dbname=curso_php_basico","root","root");

	return $conexao;
}