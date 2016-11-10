<?php 
	include_once '../Conexao.class.php';
	include_once '../model/Produto.class.php';
	include_once '../model/Tipo.class.php';
	include_once '../model/Fornecedor.class.php';


	class ProdutoDAO{
		
		public function insereProduto(Produto $produto){
			try{
				$pdo = Conexao::getConexao();
				
				$query = "INSERT INTO PRODUTO (NOME, VALOR, VALIDADE, TIPO, FORNECEDOR) VALUES (:nome, :valor, :validade, :tipo, :fornecedor)";

				$stmt = $pdo->prepare($query);

				$stmt->bindValue(':nome', $produto->getNome());
				$stmt->bindValue(':valor', $produto->getValor());
				$stmt->bindValue(':validade', $produto->getValidade());
				$stmt->bindValue(':tipo', $produto->getTipo()->getId());
				$stmt->bindValue(':fornecedor', $produto->getFornecedor()->getId());

				$stmt->execute();

			}catch(PDOException $e){
				"<script>alert('Erro: {$e->getMessage()}') </script>";
			}
		}

		public function selecionaProdutos(){
			
			try{

				$pdo = Conexao::getConexao();

				$query = "select p.ID, p.NOME, p.VALOR, p.VALIDADE, t.DESCRICAO, t.ID AS TID, f.NOME AS FNOME, f.ID AS FID  from produto p inner join tipo t on (p.TIPO = t.ID) inner join fornecedor f on (p.FORNECEDOR = f.ID)";

				$stmt = $pdo->prepare($query);

				$stmt->execute();

				$resultado = new ArrayObject();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$produto = new Produto();
					$produto->setId($row['ID']);
					$produto->setNome($row['NOME']);
					$produto->setValor($row['VALOR']);
					$produto->setValidade($row['VALIDADE']);
					$tipo = new Tipo();
					$tipo->setDescricao($row['DESCRICAO']);
					$tipo->setId($row['TID']);
					$produto->setTipo($tipo);
					$fornecedor = new Fornecedor();
					$fornecedor->setNome($row['FNOME']);
					$fornecedor->setId($row['FID']);
					$produto->setFornecedor($fornecedor);

					$resultado->append($produto);
				}

				return $resultado;

			}catch(PDOException $e){
				"<script>alert('Erro: {$e->getMessage()}') </script>";
			}
		}

		public function deletaProduto($idProduto, $idTipo, $idFornecedor){

			try{
				$pdo = Conexao::getConexao();
				
				$query = "DELETE FROM PRODUTO WHERE ID = :id AND TIPO = :tipo and FORNECEDOR = :fornecedor";

				$stmt = $pdo->prepare($query);

				$stmt->bindValue(':id', $idProduto);
				$stmt->bindValue(':tipo', $idTipo);
				$stmt->bindValue(':fornecedor', $idFornecedor);

				$stmt->execute();

			}catch(PDOException $e){
				"<script>alert('Erro: {$e->getMessage()}') </script>";
			}	
		}

		public function selecionaProdutoPorId($idProduto, $idTipo, $idFornecedor){

			try{

				$pdo = Conexao::getConexao();

				$query = "select p.ID, p.NOME, p.VALOR, p.VALIDADE, t.DESCRICAO, t.ID AS TID, f.NOME AS FNOME, f.ID AS FID  from produto p inner join tipo t on (p.TIPO = t.ID) inner join fornecedor f on (p.FORNECEDOR = f.ID) where p.ID = :idProduto and t.ID = :idTipo and f.ID = :idFornecedor";

				$stmt = $pdo->prepare($query);
				$stmt->bindValue(':idProduto', $idProduto);
				$stmt->bindValue(':idTipo', $idTipo);
				$stmt->bindValue(':idFornecedor', $idFornecedor);

				$stmt->execute();

				$resultado = new ArrayObject();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$produto = new Produto();
					$produto->setId($row['ID']);
					$produto->setNome($row['NOME']);
					$produto->setValor($row['VALOR']);
					$produto->setValidade($row['VALIDADE']);
					$tipo = new Tipo();
					$tipo->setDescricao($row['DESCRICAO']);
					$tipo->setId($row['TID']);
					$produto->setTipo($tipo);
					$fornecedor = new Fornecedor();
					$fornecedor->setNome($row['FNOME']);
					$fornecedor->setId($row['FID']);
					$produto->setFornecedor($fornecedor);

				}

				return $produto;

			}catch(PDOException $e){
				"<script>alert('Erro: {$e->getMessage()}') </script>";
			}
		}

		public function editaProduto(Produto $produto){
			
			try{

				$pdo = Conexao::getConexao();

				$query = "UPDATE PRODUTO SET ID = :idProduto, NOME = :nome, VALOR = :valor, VALIDADE = :validade, FORNECEDOR = :idFornecedor, TIPO = :idTipo WHERE ID = :idProduto";

				$stmt = $pdo->prepare($query);

				$stmt->bindValue(':nome', $produto->getNome());
				$stmt->bindValue(':valor', $produto->getValor());
				$stmt->bindValue(':validade', $produto->getValidade());
				$stmt->bindValue(':idProduto', $produto->getId());
				$stmt->bindValue(':idTipo', $produto->getTipo()->getId());
				$stmt->bindValue(':idFornecedor', $produto->getFornecedor()->getId());

				if($stmt->execute()){
					echo "Update realizado!";
				}

			}catch(PDOException $e){
				"<script>alert('Erro: {$e->getMessage()}') </script>";
			}
		}
	}

 ?>

