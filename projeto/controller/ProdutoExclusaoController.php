<?php 

	include_once('../dao/ProdutoDAO.class.php');

	$idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_STRING);
	$idTipo = filter_input(INPUT_GET, 'idTipo', FILTER_SANITIZE_STRING);
	$idFornecedor = filter_input(INPUT_GET, 'idFornecedor', FILTER_SANITIZE_STRING);

	$dao = new ProdutoDAO();
	$dao->deletaProduto($idProduto, $idTipo, $idFornecedor);

	header('Location: ../template/index.php');
 ?>