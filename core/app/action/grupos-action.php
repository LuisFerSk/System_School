<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$grupos=new GruposData();
	$grupos->id_grado=$_POST["id_grado"];
	$grupos->curso=$_POST["curso"];

	$grupos->add();
	header("location: ./?view=grupos&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$grupos= new GruposData();
	$grupos->id=$_POST["id"];
	$grupos->id_grado=$_POST["id_grado"];
	$grupos->curso=$_POST["curso"];
	$grupos->update();
	header("location: ./?view=grupos&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$grupos=new GruposData();
	$grupos->id=$_GET["id"];
	$grupos->del();
	header("location: ./?view=grupos&opt=all");
}

 ?>