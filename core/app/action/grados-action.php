<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$grados=new GradosData();
	$grados->nombre=$_POST["nombre"];
	$grados->nivel=$_POST["nivel"];

	$grados->add();
	header("location: ./?view=grados&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$grados= new GradosData();
	$grados->id=$_POST["id"];
	$grados->nombre=$_POST["nombre"];
	$grados->update();
	header("location: ./?view=grados&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$grados=new GradosData();
	$grados->id=$_GET["id"];
	$grados->del();
	header("location: ./?view=grados&opt=all");
}

 ?>