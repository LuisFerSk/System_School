<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$a_academico=new PeriodoAcademicoData();
	$a_academico->nombre=$_POST["nombre"];
	$a_academico->fecha_inicio=$_POST["fechainicio"];
	$a_academico->fecha_fin=$_POST["fechafin"];
	$a_academico->estado=$_POST["estado"];
	$a_academico->add();
	header("location: ./?view=periodo_academico&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$a_academico= new PeriodoAcademicoData();
	$a_academico->id=$_POST["id"];
	$a_academico->nombre=$_POST["nombre"];
	$a_academico->fecha_inicio=$_POST["fechainicio"];
	$a_academico->fecha_fin=$_POST["fechafin"];
	$a_academico->estado=$_POST["estado"];
	$a_academico->update();
	header("location: ./?view=periodo_academico&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$a_academico=new PeriodoAcademicoData();
	$a_academico->id=$_GET["id"];
	// $a_academico->del();
	header("location: ./?view=periodo_academico&opt=all");
}
