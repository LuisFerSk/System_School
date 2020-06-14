<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$a_academico=new A_academicoData();
	$a_academico->nombre=$_POST["nombre"];
	$a_academico->fechainicio=$_POST["fechainicio"];
	$a_academico->fechafin=$_POST["fechafin"];
	$a_academico->iniciomatricula=$_POST["iniciomatricula"];
	$a_academico->finmatricula=$_POST["finmatricula"];
	$a_academico->inicioprimerparcial=$_POST["inicioprimerparcial"];
	$a_academico->finprimerparcial=$_POST["finprimerparcial"];
	$a_academico->iniciosegundoparcial=$_POST["iniciosegundoparcial"];
	$a_academico->finsegundoparcial=$_POST["finsegundoparcial"];
	$a_academico->inicioparcialfinal=$_POST["inicioparcialfinal"];
	$a_academico->finparcialfinal=$_POST["finparcialfinal"];
	$a_academico->estado=$_POST["estado"];
	$a_academico->add();
	header("location: ./?view=a_academico&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$a_academico= new A_academicoData();
	$a_academico->id=$_POST["id_a"];
	$a_academico->nombre=$_POST["nombre"];
	$a_academico->fechainicio=$_POST["fechainicio"];
	$a_academico->fechafin=$_POST["fechafin"];
	$a_academico->iniciomatricula=$_POST["iniciomatricula"];
	$a_academico->finmatricula=$_POST["finmatricula"];
	$a_academico->inicioprimerparcial=$_POST["inicioprimerparcial"];
	$a_academico->finprimerparcial=$_POST["finprimerparcial"];
	$a_academico->iniciosegundoparcial=$_POST["iniciosegundoparcial"];
	$a_academico->finsegundoparcial=$_POST["finsegundoparcial"];
	$a_academico->inicioparcialfinal=$_POST["inicioparcialfinal"];
	$a_academico->finparcialfinal=$_POST["finparcialfinal"];
	$a_academico->estado=$_POST["estado"];
	$a_academico->update();
	header("location: ./?view=a_academico&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$a_academico=new A_academicoData();
	$a_academico->id=$_GET["id"];
	$a_academico->del();
	header("location: ./?view=a_academico&opt=all");
}
