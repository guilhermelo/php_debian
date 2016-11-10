<?php 

	
	function exibeData($data){

		$dados = explode('-', $data);

		$novaData = $dados[2] ."/".$dados[1]."/".$dados[0];

		return $novaData;
	}

	function ajustaData($data){

		$dados = explode('/', $data);

		$novaData = $dados[2] ."-".$dados[1]."-".$dados[0];

		return $novaData;
	}	

 ?>