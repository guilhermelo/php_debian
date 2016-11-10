<?php 

	include_once('../dao/TipoDAO.class.php');
	include_once('../model/Tipo.class.php');

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$dao = new TipoDAO();
	$dao->deletaTipo($id);

	header('Location: ../template/tipo.php');
 ?>