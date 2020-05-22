<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$cursogra=new CursograData();
	$cursogra->id_grado=$_POST["id_grado"];
    $cursogra->curso=$_POST["curso"];	
	$cursogra->add();
	header("location: ./?view=cursogra&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$cursogra= new CursograData();
	$cursogra->id=$_POST["id"];
	$cursogra->id_grado=$_POST["id_grado"];
	$cursogra->curso=$_POST["curso"];
	$cursogra->update();
	header("location: ./?view=cursogra&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$cursogra=new CursograData();
	$cursogra->id=$_GET["id"];
	$cursogra->del();
	header("location: ./?view=cursogra&opt=all");
}

 ?>