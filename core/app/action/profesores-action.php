<?php
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$profesores=new ProfesoresData();
	$profesores->dni=$_POST["dni"];
	$profesores->nombres=$_POST["nombres"];
	$profesores->apellidos=$_POST["apellidos"];
	$profesores->especialidad=$_POST["especialidad"];
	$profesores->num_cel=$_POST["num_cel"];
	$profesores->email=$_POST["email"];
	$profesores->direccion=$_POST["direccion"];
	$profesores->add();
	header("location: ./?view=profesores&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$profesores= new ProfesoresData();
	$profesores->id=$_POST["id"];
	$profesores->nombres=$_POST["nombres"];
	$profesores->apellidos=$_POST["apellidos"];
	$profesores->dni=$_POST["dni"];
	$profesores->num_cel=$_POST["num_cel"];
	$profesores->email=$_POST["email"];
	$profesores->especialidad=$_POST["especialidad"];
	$profesores->direccion=$_POST["direccion"];
	$profesores->update();
	header("location: ./?view=profesores&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$profesores=new ProfesoresData();
	$profesores->id=$_GET["id"];
	$profesores->del();
	header("location: ./?view=profesores&opt=all");
}

 ?>