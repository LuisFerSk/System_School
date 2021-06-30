<?php 
if (isset($_GET["opt"])&& $_GET["opt"]="getNumberClass") :
	$grupos=new GrupoData();

elseif (isset($_GET["opt"])&& $_GET["opt"]=="add") :
	$grupos=new GrupoData();
	$grupos->id_grado=$_POST["id_grado"];
	$grupos->curso=$_POST["curso"];
	$grupos->add();
	header("location: ./?view=grupos&opt=all");

elseif (isset($_GET["opt"])&& $_GET["opt"]=="upd") :
	$grupos= new GrupoData();
	$grupos->id=$_POST["id"];
	$grupos->id_grado=$_POST["id_grado"];
	$grupos->curso=$_POST["curso"];
	$grupos->update();
	header("location: ./?view=grupos&opt=all");

endif;

