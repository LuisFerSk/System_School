<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$niveles=new NivelesData();
	$niveles->nombre=$_POST["nombre"];

	$niveles->add();
	header("location: ./?view=niveles&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$niveles= new NivelesData();
	$niveles->id=$_POST["id"];
	$niveles->nombre=$_POST["nombre"];
	$niveles->update();
	header("location: ./?view=niveles&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$niveles=new NivelesData();
	$niveles->id=$_GET["id"];
	$niveles->del();
	header("location: ./?view=niveles&opt=all");
}

 ?>