<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$estudiantes=new EstudiantesData();

	$estudiantes->dni=$_POST["dni"];
	$estudiantes->primer_apellido=$_POST["primer_apellido"];
	$estudiantes->segundo_apellido=$_POST["segundo_apellido"];
	$estudiantes->nombre=$_POST["nombre"];
	$estudiantes->genero=$_POST["genero"];
	$estudiantes->programa=$_POST["programa"];
	$estudiantes->fecha_nac=$_POST["fecha_nac"];
	$estudiantes->email=$_POST["email"];
	$estudiantes->estado=$_POST["estado"];
	$estudiantes->fecha_reg=date("y-m-d");
	$estudiantes->add();
	
	header("location: ./?view=estudiantes&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$estudiantes= new EstudiantesData();
	$estudiantes->id_estudiante=$_POST["id"];
	$estudiantes->nombre=$_POST["nombre"];
	$estudiantes->primer_apellido=$_POST["primer_apellido"];
	$estudiantes->segundo_apellido=$_POST["segundo_apellido"];
	$estudiantes->dni=$_POST["dni"];
	$estudiantes->fecha_nac=$_POST["fecha_nac"];
	$estudiantes->email=$_POST["email"];
	$estudiantes->estado=$_POST["estado"];
	$estudiantes->genero=$_POST["genero"];
	$estudiantes->update();
	header("location: ./?view=estudiantes&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$emi=new EstudiantesData();
	$emi->id=$_GET["id"];
	$emi->del();
	header("location: ./?view=estudiantes&opt=all");
}
