<?php 
	
	include_once('../dao/TipoDAO.class.php');
	include_once('../model/Tipo.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

	if(isset($id) && !empty($id) && is_integer($id)){

		$dao = new TipoDAO();

		$tipo = $dao->selecionaTipoPorId($id);
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
	<h1>Editar Tipo</h1>

	<form action="../controller/TipoEdicaoController.php" method="post" accept-charset="utf-8">
		<input type="hidden" name="id" value="<?= $tipo->getId() ?>">
		<label>Descrição</label>
		<input type="text" name="descricao" value="<?= $tipo->getDescricao() ?>" placeholder="Digite a descrição">
		
		<input type="submit" name="cadastrar" value="Editar">
	</form>
</body>
</html>