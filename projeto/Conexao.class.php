<?php 

define("USUARIO", 'root');
define("SENHA", '');

class Conexao{

	public static function getConexao(){

		$pdo = new PDO('mysql:host=localhost;dbname=cadastro_produto', USUARIO, SENHA);

		return $pdo;
	}
}

 ?>