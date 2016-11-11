<?php 

	include_once('../dao/TipoDAO.class.php');
	include_once('../model/Tipo.class.php');

	$id = filter_input(INPUT_POST, 'id');
	$descricao = filter_input(INPUT_POST, 'descricao');

	if(isset($descricao) && !empty($descricao) && !is_numeric($descricao)){
		$tipo = new Tipo();

		$tipo->setId($id);
		$tipo->setDescricao($descricao);

		$dao = new TipoDAO();
		$dao->editaTipo($tipo);

		header('Location: ../template/tipo.php');

	}else{
		?>

		<a href="../template/tipo_edicao.php?id=<?= $id ?>">Voltar</a>	
		<?php
		echo "<script>alert('Descricao invalida!');</script>";
	}
 ?>
