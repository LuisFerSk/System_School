<?php

if(!empty($_POST)){
	$found = CalificacionData::getByBA($_POST["id_bloque"],$_POST["id_estudiante"]);
	if($found==null && $_POST["nota"]!=""){
	$assis = new CalificacionData();
	$assis->id_estudiante = $_POST["id_estudiante"];
	$assis->id_bloque = $_POST["id_bloque"];
	$assis->nota = $_POST["nota"];
	$assis->add();
	}else if($found=!null&&$_POST["nota"]!=""){
	$found = CalificacionData::getByBA($_POST["id_bloque"],$_POST["id_estudiante"]);
	$found->nota = $_POST["nota"];
	$found->update();

	}else if($_POST["nota"]==""){
		//$found = CalificacionData::getByBA($_POST["id_estudiante"],$_POST["id_bloque"]);
		//$found->del();
	}
}

?>