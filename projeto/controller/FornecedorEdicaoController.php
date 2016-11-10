<?php 

	include_once('../dao/FornecedorDAO.class.php');
	include_once('../model/Fornecedor.class.php');

	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);


	if(empty($nome) || !isset($nome) || !is_string($nome)){
		echo "<script>alert('Nome invalido!');</script>";

		echo "<a href='../template/fornecedor_edicao.php?id=".$id."'>Voltar</a>";
	}else if(empty($endereco) || !isset($endereco) || !is_string($endereco)){
		echo "<script>alert('Endereco invalido!');</script>";

		echo "<a href='../template/fornecedor_edicao.php?id=".$id."'>Voltar</a>";
	}else if(empty($cnpj) || !isset($cnpj) || !is_numeric($cnpj)){
		echo "<script>alert('CNPJ invalido!');</script>";

		echo "<a href='../template/fornecedor_edicao.php?id=".$id."'>Voltar</a>";
	}else{

		$fornecedor = new Fornecedor();

		$fornecedor->setId($id);
		$fornecedor->setNome($nome);
		$fornecedor->setEndereco($endereco);
		$fornecedor->setCnpj($cnpj);

		$dao = new FornecedorDAO();
		$dao->editaFornecedor($fornecedor);

		header('Location: ../template/fornecedor.php');
	}
 ?>