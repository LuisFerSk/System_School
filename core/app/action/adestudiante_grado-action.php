<?php

if(!empty($_GET)){
	$at = Est_graData::getByAT($_GET["al_id"],$_GET["t_id"]);
	if($at==null){
		$at = new Est_graData();
		$at->id_grado = $_GET["t_id"];
		$at->id_estudiante = $_GET["al_id"];
		$at->add();
		Core::alert("Asignacion de grupo exitosa!");
		Core::redir("./?view=abrirestu&id=".$_GET["al_id"]);
	}
}


?>