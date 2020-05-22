<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$calificacion=new CalificacionData();
	$calificacion->descripcion=$_POST["descripcion"];
	$calificacion->id_estudiante=$_POST["id_estudiante"];
	$calificacion->id_curso=$_POST["id_curso"];
	$calificacion->nota=$_POST["nota"];

	$calificacion->add();
	header("location: ./?view=calificacion&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$calificacion= new CalificacionData();
	$calificacion->id=$_POST["id"];
	$calificacion->descripcion=$_POST["descripcion"];
	$calificacion->nota=$_POST["nota"];
	$calificacion->update();
	header("location: ./?view=calificacion&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$calificacion=new CalificacionData();
	$calificacion->id=$_GET["id"];
	$calificacion->del();
	header("location: ./?view=calificacion&opt=all");
}

 ?>