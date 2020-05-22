<?php

if(count($_POST)>0){
	$user = new EstuData();
	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellido_paterno = $_POST["apellido_paterno"];
	$user->apellido_materno = $_POST["apellido_materno"];
	$user->fecha_nac = $_POST["fecha_nac"];
	$user->genero = $_POST["genero"];
	$user->direccion = $_POST["direccion"];
	$user->num_cel = $_POST["num_cel"];
	$user->apoderado = $_POST["apoderado"];
	$user->estado = $_POST["estado"];

	$user->user_id = $_SESSION["user_id"];


	$u = $user->add();

	$at = new Est_graData();
	$at->id_estudiante = $u[1];
	$at->id_grado = $_POST["id_grado"];
	$at->add();


print "<script>window.location='./?view=est_gra&id=$_POST[id_grado]';</script>";

}


?>