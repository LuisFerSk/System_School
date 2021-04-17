<?php
if (isset($_GET["opt"]) && $_GET["opt"] == "add") {

	$user = new UserData();

	$user->email = $_POST["email"];
	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->password = sha1(md5($_POST["password"]));
	$user->kind = 3;
	$user->estado = $_POST["estado"];

	$estudiante = new EstudianteData();

	$estudiante->dni = $_POST["dni"];
	$estudiante->programa = $_POST["programa"];
	$estudiante->estado = $_POST["estado"];

	$user->add();

	$estudiante->add();

	header("location: ./?view=estudiantes&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "upd") {

	$user = new UserData();

	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->email = $_POST["email"];

	$estudiante = new EstudianteData();

	$estudiante->dni = $_POST["dni"];
	$estudiante->programa = $_POST["programa"];
	$estudiante->estado = $_POST["estado"];

	$estudiante->update();
	$user->updateInfo();
	header("location: ./?view=estudiantes&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "del") {
	$emi = new EstudianteData();
	$emi->id = $_GET["id"];
	$emi->del();
	header("location: ./?view=estudiantes&opt=all");
}
