<?php 


include_once('../Conexao.class.php');
include_once('../model/Fornecedor.class.php');


/**
* Classe responsável pelo CRUD de Fornecedor de produto
*/
class FornecedorDAO{
	
	public function insereFornecedor(Fornecedor $fornecedor){
		
		try{
			$pdo = Conexao::getConexao();
			
			$query = "INSERT INTO FORNECEDOR (ID, NOME, ENDERECO, CNPJ) VALUES (:id, :nome, :endereco, :cnpj)";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $fornecedor->getId());
			$stmt->bindValue(':nome', $fornecedor->getNome());
			$stmt->bindValue(':endereco', $fornecedor->getEndereco());
			$stmt->bindValue(':cnpj', $fornecedor->getCnpj());

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}
	}

	public function deletaFornecedor($idFornecedor){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "DELETE FROM FORNECEDOR WHERE ID = :id";

			$stmt = $pdo->prepare($query);

			$stmt->bindValue(':id', $idFornecedor);

			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaFornecedores(){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT ID, NOME, ENDERECO, CNPJ FROM FORNECEDOR";

			$stmt = $pdo->prepare($query);

			$stmt->execute();

			$resultado = new ArrayObject();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$fornecedor = new Fornecedor();

				$fornecedor->setId($row['ID']);
				$fornecedor->setNome($row['NOME']);
				$fornecedor->setEndereco($row['ENDERECO']);
				$fornecedor->setCnpj($row['CNPJ']);

				$resultado->append($fornecedor);
			}

			return $resultado;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function editaFornecedor(Fornecedor $fornecedor){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "UPDATE FORNECEDOR SET NOME = :nome, ENDERECO = :endereco, CNPJ = :cnpj  WHERE ID = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':nome', $fornecedor->getNome());
			$stmt->bindValue(':endereco', $fornecedor->getEndereco());
			$stmt->bindValue(':cnpj', $fornecedor->getCnpj());
			$stmt->bindValue(':id', $fornecedor->getId());
			$stmt->execute();

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}

	public function selecionaFornecedorPorId($idFornecedor){

		try{
			$pdo = Conexao::getConexao();
			
			$query = "SELECT ID, NOME, ENDERECO, CNPJ FROM FORNECEDOR WHERE ID = :id";

			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $idFornecedor);

			$stmt->execute();

			$fornecedor = new Fornecedor();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$fornecedor->setId($row['ID']);
				$fornecedor->setNome($row['NOME']);
				$fornecedor->setEndereco($row['ENDERECO']);
				$fornecedor->setCnpj($row['CNPJ']);
			}

			return $fornecedor;

		}catch(PDOException $e){
			"<script>alert('Erro: {$e->getMessage()}') </script>";
		}	
	}
}


 ?>