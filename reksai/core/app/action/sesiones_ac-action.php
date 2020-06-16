<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$sesiones_ac=new Sesiones_acData();
	$sesiones_ac->id_nomina=$_POST["id_nomina"];
	$sesiones_ac->id_prof=$_POST["id_prof"];
	$sesiones_ac->id_curso=$_POST["id_curso"];
	$sesiones_ac->asistencia=$_POST["asistencia"];
    $sesiones_ac->fecha_reg=date("y-m-d");

	$sesiones_ac->add();
	header("location: ./?view=sesiones_ac&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$sesiones_ac= new Sesiones_acData();
	$sesiones_ac->id=$_POST["id"];
	$sesiones_ac->nombre=$_POST["nombre"];
	$sesiones_ac->update();
	header("location: ./?view=sesiones_ac&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$sesiones_ac=new Sesiones_acData();
	$sesiones_ac->id=$_GET["id"];
	$sesiones_ac->del();
	header("location: ./?view=sesiones_ac&opt=all");
}

 ?>