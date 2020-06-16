<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$asistencia=new AsistenciaData();
	$asistencia->nombre=$_POST["nombre"];
	$asistencia->id_nomina=$_POST["id_nomina"];
	$asistencia->id_curso=$_POST["id_curso"];
	$asistencia->fecha=$_POST["fecha"];

	$asistencia->add();
	header("location: ./?view=asistencia&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$asistencia= new AsistenciaData();
	$asistencia->id=$_POST["id"];
	$asistencia->nombre=$_POST["nombre"];
	$asistencia->nota=$_POST["nota"];
	$asistencia->update();
	header("location: ./?view=asistencia&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$asistencia=new AsistenciaData();
	$asistencia->id=$_GET["id"];
	$asistencia->del();
	header("location: ./?view=asistencia&opt=all");
}

 ?>