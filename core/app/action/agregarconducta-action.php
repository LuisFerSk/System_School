<?php

if(!empty($_POST)){
	$found = ConductaData::getByATD($_POST["id_estudiante"],$_POST["id_grado"],$_POST["date_at"]);
	if($found==null && $_POST["tipo"]!=""){
	$assis = new ConductaData();
	$assis->id_estudiante = $_POST["id_estudiante"];
	$assis->id_grado = $_POST["id_grado"];
	$assis->tipo = $_POST["tipo"];
	$assis->date_at = $_POST["date_at"];
	$assis->add();
	}else if($found=!null&&$_POST["tipo"]!=""){
	$found = ConductaData::getByATD($_POST["id_estudiante"],$_POST["id_grado"],$_POST["date_at"]);
	
	$found->tipo = $_POST["tipo"];
	$found->update();

	}else if($_POST["tipo"]==""){
	$found = ConductaData::getByATD($_POST["id_estudiante"],$_POST["id_grado"],$_POST["date_at"]);
		$found->del();
	}
}

?>