<?php 
	
	include_once('../dao/TipoDAO.class.php');

	$daoTipo = new TipoDAO();

	$tipos = $daoTipo->selecionaTipos();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Tipos</title>
	<link rel="stylesheet" href="">
</head>
<body>


	<h1>Cadastro de Tipos</h1>

	<form action="../controller/TipoInsercaoController.php" method="post" accept-charset="utf-8">
		<input type="text" name="descricao" value="" >
		
		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>
	<br>
	<br>
	<table border="1px">
		<thead>
			<tr>
				<th>Código</th>
				<th>Descrição</th>
				<th colspan="2">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tipos as $tipo): ?>
			<tr>
				<td><?= $tipo->getId(); ?></td>
				<td><?= $tipo->getDescricao(); ?></td>
				<td><a href="../template/tipo_edicao.php?id=<?= $tipo->getId(); ?>">Editar</a></td>
				<td><a href="../controller/TipoExclusaoController.php?id=<?= $tipo->getId(); ?>">Excluir</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>