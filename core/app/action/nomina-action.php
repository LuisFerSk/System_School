<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {
	$nomina=new NominaData();
	$nomina->id_estudiante=$_POST["id_estudiante"];
	$nomina->id_grado=$_POST["id_grado"];
	$nomina->id_a=$_POST["id_a"];
    $nomina->fecha=date("y-m-d");

	$nomina->add();
	header("location: ./?view=nomina&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {
	$nomina= new NominaData();
	$nomina->id=$_POST["id"];
	$nomina->nombre=$_POST["nombre"];
	$nomina->update();
	header("location: ./?view=nomina&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$nomina=new NominaData();
	$nomina->id=$_GET["id"];
	$nomina->del();
	header("location: ./?view=nomina&opt=all");
}

 ?>