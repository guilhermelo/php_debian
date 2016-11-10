<?php 
	
	include_once('../dao/FornecedorDAO.class.php');
	include_once('../model/Fornecedor.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

	if(isset($id) && !empty($id) && is_integer($id)){

		$dao = new FornecedorDAO();

		$fornecedor = $dao->selecionaFornecedorPorId($id);
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Editar Fornecedor</h1>

	<form action="../controller/FornecedorEdicaoController.php" method="post" accept-charset="utf-8">
		<input type="hidden" name="id" value="<?= $fornecedor->getId(); ?>">
		<label>Nome: </label>
		input
		<input type="text" name="nome" value="<?= $fornecedor->getNome(); ?>">
		<br><br>
		<label>Endereço: </label>
		<input type="text" name="endereco" value="<?= $fornecedor->getEndereco(); ?>">
		<br><br>
		<label>CNPJ: </label>
		<input type="text" name="cnpj" value="<?= $fornecedor->getCnpj(); ?>" >
		<br><br>
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>