<?php 

	include_once('../dao/ProdutoDAO.class.php');
	include_once('../controller/helper.php');

	$idProduto = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$idTipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
	$idFornecedor = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_STRING);


	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
	$validade = filter_input(INPUT_POST, 'validade', FILTER_SANITIZE_STRING);


	if(empty($nome) || !isset($nome) || !is_string($nome)){
		echo "<script>alert('Nome invalido!');</script>";

		echo  "<a href='../template/produto_edicao.php?idProduto=".$idProduto. "&idTipo=". $idTipo ."&idFornecedor=". $idFornecedor ."'>Voltar</a>";
	}else if(empty($valor) || !isset($valor) || !is_numeric($valor)){
		echo "<script>alert('Valor invalido!');</script>";
		
		
		echo  "<a href='../template/produto_edicao.php?idProduto=".$idProduto. "&idTipo=". $idTipo ."&idFornecedor=". $idFornecedor ."'>Voltar</a>";
		
	}else if(empty($validade) || !isset($validade) || !is_string($validade)){
		echo "<script>alert('Validade invalida!');</script>";

		echo  "<a href='../template/produto_edicao.php?idProduto=".$idProduto. "&idTipo=". $idTipo ."&idFornecedor=". $idFornecedor ."'>Voltar</a>";
	}else{

		$produto = new Produto();
		$produto->setNome($nome);
		$produto->setValidade(ajustaData($validade));
		$produto->setValor($valor);
		$produto->setId($idProduto);
		$produto->getFornecedor()->setId($idFornecedor);
		$produto->getTipo()->setId($idTipo);

		$dao = new ProdutoDAO();
		$dao->editaProduto($produto);

		header('Location: ../template/index.php');
	}
 ?>