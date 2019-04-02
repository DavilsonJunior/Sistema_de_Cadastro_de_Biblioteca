<?php
try {
	$pdo = new PDO("mysql:dbname=sistema_biblioteca;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}