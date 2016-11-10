<?php

	include_once('../dao/ProdutoDAO.class.php');
	include_once('../dao/TipoDAO.class.php');
	include_once('../dao/FornecedorDAO.class.php');
	include_once('../controller/helper.php');

	$idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_STRING);
	$idTipo = filter_input(INPUT_GET, 'idTipo', FILTER_SANITIZE_STRING);
	$idFornecedor = filter_input(INPUT_GET, 'idFornecedor', FILTER_SANITIZE_STRING);

	$daoTipo = new TipoDAO();
	$daoFornecedor = new FornecedorDAO();
	$dao = new ProdutoDAO();

	$tipos = $daoTipo->selecionaTipos();
	$fornecedores = $daoFornecedor->selecionaFornecedores();

	$produto = $dao->selecionaProdutoPorId($idProduto, $idTipo, $idFornecedor);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
</head>
<body>
	<h1>Editar Produto</h1>
	<form action="../controller/ProdutoEdicaoController.php" method="post">
		<input type="hidden" name="id" value="<?= $produto->getId(); ?>">
		<label>Nome: </label>
		<input type="text" name="nome" value="<?= $produto->getNome(); ?>" placeholder="">
		<label>Valor: </label>
		<input type="text" name="valor" value="<?= $produto->getValor(); ?>" placeholder="">
		<label>Validade: </label>
		<input type="text" name="validade" value="<?= exibeData($produto->getValidade()) ?>" placeholder="">
		<select name="tipo">
			<option value="<?= $produto->getTipo()->getId(); ?>" selected><?= $produto->getTipo()->getDescricao(); ?></option>
			<?php foreach($tipos as $t): ?>
				<option value="<?= $t->getId(); ?>"><?= $t->getDescricao(); ?></option>
			<?php endforeach; ?>
		</select>
		<select name="fornecedor">
			<option value="<?= $produto->getFornecedor()->getId(); ?>" selected><?= $produto->getFornecedor()->getNome(); ?></option>
			<?php foreach($fornecedores as $f): ?>
				<option value="<?= $f->getId(); ?>"><?= $f->getNome(); ?></option>
			<?php endforeach; ?>
		</select>
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>