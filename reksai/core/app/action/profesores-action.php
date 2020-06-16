<?php
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$profesores=new ProfesoresData();
	$profesores->dni=$_POST["dni"];
	$profesores->nombres=$_POST["nombres"];
	$profesores->primer_apellido=$_POST["primer_apellido"];
	$profesores->segundo_apellido=$_POST["segundo_apellido"];
	$profesores->email=$_POST["email"];
	$profesores->estado=$_POST["estado"];
	$profesores->add();
	header("location: ./?view=profesores&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$profesores= new ProfesoresData();
	$profesores->id_prof=$_POST["id"];
	$profesores->nombres=$_POST["nombres"];
	$profesores->primer_apellido=$_POST["primer_apellido"];
	$profesores->segundo_apellido=$_POST["segundo_apellido"];
	$profesores->dni=$_POST["dni"];
	$profesores->email=$_POST["email"];
	$profesores->estado=$_POST["estado"];
	$profesores->update();
	header("location: ./?view=profesores&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$profesores=new ProfesoresData();
	$profesores->id=$_GET["id"];
	$profesores->del();
	header("location: ./?view=profesores&opt=all");
}

