<?php 

	include_once('../model/Fornecedor.class.php');
	include_once('../dao/FornecedorDAO.class.php');

	$nome = filter_input(INPUT_POST, 'nome');
	$endereco = filter_input(INPUT_POST, 'endereco');
	$cnpj = filter_input(INPUT_POST, 'cnpj');


	if(empty($nome) || !isset($nome) || !is_string($nome)){
		echo "<script>alert('Nome invalido!');</script>";

		echo "<a href='../template/fornecedor.php'>Voltar</a>	";
	}else if(empty($endereco) || !isset($endereco) || !is_string($endereco)){
		echo "<script>alert('Endereco invalido!');</script>";

		echo "<a href='../template/fornecedor.php'>Voltar</a>	";
	}else if(empty($cnpj) || !isset($cnpj) || !is_numeric($cnpj)){
		echo "<script>alert('CNPJ invalido!');</script>";

		echo "<a href='../template/fornecedor.php'>Voltar</a>	";
	}else{
		$fornecedor = new Fornecedor();

		$fornecedor->setNome($nome);
		$fornecedor->setEndereco($endereco);
		$fornecedor->setCnpj($cnpj);

		$dao = new FornecedorDAO();

		$dao->insereFornecedor($fornecedor);

		header('Location: ../template/fornecedor.php');
	}

 ?>