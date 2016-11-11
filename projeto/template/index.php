<?php 
	include_once('../dao/ProdutoDAO.class.php');
	include_once('../dao/TipoDAO.class.php');
	include_once('../dao/FornecedorDAO.class.php');
	include_once('../controller/helper.php');
	
	$daoProduto = new ProdutoDAO();

	$produtos = $daoProduto->selecionaProdutos();

	$daoTipo = new TipoDAO();
	$tipos = $daoTipo->selecionaTipos();
	$daoFornecedor = new FornecedorDAO();
	$fornecedores = $daoFornecedor->selecionaFornecedores();
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
</head>
<body>
	<a href="../template/fornecedor.php">Cadastrar Fornecedor</a>
	<br>
	<br>
	<a href="../template/tipo.php">Cadastrar Tipo</a>
	<br>
	<br>
	<br>
	<h1>Cadastro de Produtos</h1>
	<form action="../controller/ProdutoInsercaoController.php" method="post">
		<label>Nome: </label>
		<input type="text" name="nome" value="" placeholder="">
		<br>
		<br>
		<label>Valor: </label>
		<input type="text" name="valor" value="" placeholder="">
		<br>
		<br>
		<label>Validade: </label>
		<input type="date" name="validade" value="" placeholder="">
		<br>
		<br>
		<label>Tipo: </label>
		<select name="tipo">
			<?php foreach($tipos as $t): ?>
				<option value="<?= $t->getId(); ?>"><?= $t->getDescricao(); ?></option>
			<?php endforeach; ?>
		</select>
		<br>
		<br>
		<label>Fornecedor: </label>
		<select name="fornecedor">
			<?php foreach($fornecedores as $f): ?>
				<option value="<?= $f->getId(); ?>"><?= $f->getNome(); ?></option>
			<?php endforeach; ?>
		</select>
		<br>
		<br>
		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>

	<table border="1">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Valor</th>
				<th>Validade</th>
				<th>Tipo</th>
				<th>Fornecedor</th>
				<th colspan="2">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($produtos as $produto): ?>
				<tr>
					<td><?= $produto->getNome(); ?></td>
					<td><?= $produto->getValor(); ?></td>
					<td><?= exibeData($produto->getValidade()) ?></td>
					<td><?= $produto->getTipo()->getDescricao(); ?></td>
					<td><?= $produto->getFornecedor()->getNome(); ?></td>
					<td>
						<a href="../template/produto_edicao.php?idProduto=<?= $produto->getId(); ?>&idTipo=<?= $produto->getTipo()->getId(); ?>&idFornecedor=<?= $produto->getFornecedor()->getId(); ?>">
							Edição
						</a>
					</td>
					<td><a href="../controller/ProdutoExclusaoController.php?idProduto=<?= $produto->getId(); ?>&idTipo=<?= $produto->getTipo()->getId(); ?>&idFornecedor=<?= $produto->getFornecedor()->getId(); ?>">Delete</a></td>
				</tr>
				<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>
