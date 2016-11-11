<?php 
	include_once('../model/Produto.class.php');
	include_once('../dao/ProdutoDAO.class.php');
        include_once('../controller/helper.php');
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
	$validade = filter_input(INPUT_POST, 'validade', FILTER_SANITIZE_STRING);
	$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
	$fornecedor = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_STRING);

	if(empty($nome) || !isset($nome) || !is_string($nome)){
		echo "<script>alert('Nome invalido!');</script>";

		echo "<a href='../template/index.php'>Voltar</a>";
	}else if(empty($valor) || !isset($valor) || !is_numeric($valor)){
		echo "<script>alert('Valor invalido!');</script>";

		echo "<a href='../template/index.php'>Voltar</a>";
	}else if(empty($validade) || !isset($validade) || !is_string($validade)){
		echo "<script>alert('Validade invalida!');</script>";

		echo "<a href='../template/index.php'>Voltar</a>";
	}else{
		$produto = new Produto();

		$produto->setId($id);
		$produto->setNome($nome);
		$produto->setValor($valor);
		$produto->setValidade(ajustaData($validade));

		$produto->getTipo()->setId($tipo);
		$produto->getFornecedor()->setId($fornecedor);

		$dao = new ProdutoDAO();

		$dao->insereProduto($produto);

		header('Location: ../template/index.php');
	}
 ?>
