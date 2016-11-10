<?php 
	
	include_once('../dao/FornecedorDAO.class.php');

	$daoFornecedor = new FornecedorDAO();

	$fornecedores = $daoFornecedor->selecionaFornecedores();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Fornecedores</title>
	<link rel="stylesheet" href="">
</head>
<body>


	<h1>Cadastro de Fornecedores</h1>

	<form action="../controller/FornecedorInsercaoController.php" method="post" accept-charset="utf-8">
		<label>Nome: </label>
		<input type="text" name="nome" value="">
		<br>
		<br>
		<label>Endereço: </label>
		<input type="text" name="endereco" value="">
		<br>
		<br>
		<label>CNPJ: </label>
		<input type="text" name="cnpj" value="">
		
		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>
	<br>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>CNPJ</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($fornecedores as $fornecedor): ?>
			<tr>
				<td><?= $fornecedor->getId(); ?></td>
				<td><?= $fornecedor->getNome(); ?></td>
				<td><?= $fornecedor->getEndereco(); ?></td>
				<td><?= $fornecedor->getCnpj(); ?></td>
				<td><a href="../template/fornecedor_edicao.php?id=<?= $fornecedor->getId(); ?>">Editar</a></td>
				<td><a href="../controller/FornecedorExclusaoController.php?id=<?= $fornecedor->getId(); ?>">Excluir</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>