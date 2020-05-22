<?php

if(count($_POST)>0){
	$user = GradData::getById($_POST["id_grado"]);
	$user->nombre = $_POST["nombre"];
	$user->nivel = $_POST["nivel"];
	$user->fav = isset($_POST["fav"]) ? 1 :0;
	
	$user->update();

print "<script>window.location='./?view=allgrados';</script>";


}


?>