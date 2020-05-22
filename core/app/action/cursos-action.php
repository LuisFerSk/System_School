<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$cursos=new CursosData();
	$cursos->nombre=$_POST["nombre"];
	$cursos->profesor=$_POST["profesor"];

	$cursos->add();
	header("location: ./?view=cursos&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$cursos= new CursosData();
	$cursos->id=$_POST["id"];
	$cursos->nombre=$_POST["nombre"];
	$cursos->profesor=$_POST["profesor"];
	$cursos->update();
	header("location: ./?view=cursos&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$cursos=new CursosData();
	$cursos->id=$_GET["id"];
	$cursos->del();
	header("location: ./?view=cursos&opt=all");
}

 ?>