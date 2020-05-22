<?php

if(count($_POST)>0){
	$user = new GradData();
	$user->nombre = $_POST["nombre"];
	$user->nivel = $_POST["nivel"];
	$user->fav = isset($_POST["fav"]) ? 1 :0;
	$user->id_prof = $_POST["id_prof"];
	
	$user->add();


print "<script>window.location='./?view=allgrados';</script>";

}


?>