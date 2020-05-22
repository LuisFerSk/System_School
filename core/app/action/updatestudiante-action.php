<?php

if(count($_POST)>0){
	$user = EstuData::getById($_POST["id"]);
	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellido_paterno = $_POST["apellido_paterno"];
	$user->apellido_materno = $_POST["apellido_materno"];
	$user->genero = $_POST["genero"];
	$user->num_cel = $_POST["num_cel"];
	$user->direccion = $_POST["direccion"];
	$user->apoderado = $_POST["apoderado"];
	$user->fecha_nac = $_POST["fecha_nac"];
	$user->estado = $_POST["estado"];

	$user->user_id = $_SESSION["user_id"];


	$u = $user->update();
Core::alert("Actualizado Exitosamente!");
print "<script>window.location='./?view=est_gra&id=$_POST[tid]';</script>";


}


?>