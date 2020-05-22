<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$estudiantes=new EstudiantesData();
	$estudiantes->dni=$_POST["dni"];
	$estudiantes->apellido_paterno=$_POST["apellido_paterno"];
	$estudiantes->apellido_materno=$_POST["apellido_materno"];
	$estudiantes->nombre=$_POST["nombre"];
	$estudiantes->genero=$_POST["genero"];
	$estudiantes->apoderado=$_POST["apoderado"];
	$estudiantes->num_cel=$_POST["num_cel"];
	$estudiantes->fecha_nac=$_POST["fecha_nac"];
	$estudiantes->direccion=$_POST["direccion"];
	$estudiantes->estado=$_POST["estado"];
	$estudiantes->fecha_reg=date("y-m-d");
	$estudiantes->add();
	header("location: ./?view=estudiantes&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$estudiantes= new EstudiantesData();
	$estudiantes->id=$_POST["id"];
	$estudiantes->nombre=$_POST["nombre"];
	$estudiantes->apellido_paterno=$_POST["apellido_paterno"];
	$estudiantes->apellido_materno=$_POST["apellido_materno"];
	$estudiantes->dni=$_POST["dni"];
	$estudiantes->num_cel=$_POST["num_cel"];
	$estudiantes->fecha_nac=$_POST["fecha_nac"];
	$estudiantes->estado=$_POST["estado"];
	$estudiantes->apoderado=$_POST["apoderado"];
	$estudiantes->genero=$_POST["genero"];
	$estudiantes->direccion=$_POST["direccion"];
	$estudiantes->update();
	header("location: ./?view=estudiantes&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$emi=new EstudiantesData();
	$emi->id=$_GET["id"];
	$emi->del();
	header("location: ./?view=emi&opt=all");
}

 ?>