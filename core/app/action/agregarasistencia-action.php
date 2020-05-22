<?php

if(!empty($_POST)){
	$found = AssistanceData::getByATD($_POST["id_estudiante"],$_POST["id_grado"],$_POST["fecha"]);
	if($found==null && $_POST["tipo"]!=""){
	$assis = new AssistanceData();
	$assis->id_estudiante = $_POST["id_estudiante"];
	$assis->id_grado = $_POST["id_grado"];
	$assis->tipo = $_POST["tipo"];  
	$assis->fecha = $_POST["fecha"];
	$assis->add();
	}else if($found=!null&&$_POST["tipo"]!=""){
	$found = AssistanceData::getByATD($_POST["id_estudiante"],$_POST["id_grado"],$_POST["fecha"]);
	
	$found->tipo = $_POST["tipo"];
	$found->update();

	}else if($_POST["tipo"]==""){
	$found = AssistanceData::getByATD($_POST["id_estudiante"],$_POST["id_grado"],$_POST["fecha"]);
		$found->del();
	}
}

?>