<?php 


include_once('../Conexao.class.php');
include_once('../model/Tipo.class.php');


/**
* Classe responsável pelo CRUD de Tipo de produto
*/
class TipoDAO{
	
	public function insereTipo(Tipo $tipo){
		
		try{
			$pdo = Conexao::getConexao();
			
			$query = "INSERT INTO TIPO (ID, DESCRICAO) VALUES (:id, :descricao)";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $tipo->getId());
			$stmt->bindValue(':descricao', $tipo->getDescricao());

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}
	}

	public function deletaTipo($idTipo){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "DELETE FROM TIPO WHERE ID = :id";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $idTipo);

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaTipos(){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT ID, DESCRICAO FROM TIPO";

			$stmt = $pdo->prepare($query);

			$stmt->execute();

			$resultado = new ArrayObject();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$tipo = new Tipo();

				$tipo->setId($row['ID']);
				$tipo->setDescricao($row['DESCRICAO']);

				$resultado->append($tipo);
			}

			return $resultado;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function editaTipo(Tipo $tipo){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "UPDATE TIPO SET DESCRICAO = :descricao WHERE ID = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':descricao', $tipo->getDescricao());
			$stmt->bindValue(':id', $tipo->getId());
			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaTipoPorId($idTipo){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT ID, DESCRICAO FROM TIPO WHERE ID = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $idTipo);

			$stmt->execute();

			$tipo = new Tipo();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$tipo->setId($row['ID']);
				$tipo->setDescricao($row['DESCRICAO']);
			}

			return $tipo;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}
}


 ?>