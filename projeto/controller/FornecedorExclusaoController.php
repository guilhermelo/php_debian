<?php 

	include_once('../dao/FornecedorDAO.class.php');
	include_once('../model/Fornecedor.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$dao = new FornecedorDAO();
	$dao->deletaFornecedor($id);

	header('Location: ../template/fornecedor.php');
 ?>