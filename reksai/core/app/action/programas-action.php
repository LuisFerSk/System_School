<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$programa=new ProgramaData();
	$programa->nombre=$_POST["nombre"];
	$programa->facultad=$_POST["facultad"];
	$programa->numeroPeriodos=$_POST["numeroPeriodos"];
	$programa->estado=$_POST["estado"];
	$programa->add();
	header("location: ./?view=programa&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$programa= new ProgramaData();
	$programa->id_programa=$_POST["id_programa"];
	$programa->nombre=$_POST["nombre"];
	$programa->facultad=$_POST["facultad"];
	$programa->numeroPeriodos=$_POST["numeroPeriodos"];
	$programa->estado=$_POST["estado"];
	$programa->update();
	header("location: ./?view=programa&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$programa=new ProgramaData();
	$programa->id_programa=$_GET["id"];
	$programa->del();
	header("location: ./?view=programa&opt=all");
}

