<?php 
	
	include_once('../dao/TipoDAO.class.php');
	include_once('../model/Tipo.class.php');

	$descricao = filter_input(INPUT_POST, 'descricao');

	if(isset($descricao) && !empty($descricao) && !is_numeric($descricao)){
		$tipo = new Tipo();

		$tipo->setDescricao($descricao);

		$dao = new TipoDAO();

		$dao->insereTipo($tipo);

		header('Location: ../template/tipo.php');

	}else{
		?>

		<a href="../template/tipo.php">Voltar</a>	
		<?php
		echo "<script>alert('Descricao invalida!');</script>";
	}
	
 ?>