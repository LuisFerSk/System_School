<?php
if(isset($_POST)){
	print_r($_POST);
$p = new Bloque_calData();
$p->nom_cal = $_POST['nom_cal'];
$p->id_grado = $_POST['id_grado'];
$p->add();
Core::redir("./?view=bloques&id_grado=".$_POST["id_grado"]);}
?>