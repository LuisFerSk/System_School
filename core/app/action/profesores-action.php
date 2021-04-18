<?php
if (isset($_GET["opt"]) && $_GET["opt"] == "add") {

	$user = new UserData();  

	$user->email = $_POST["email"];
	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->password = sha1(md5($_POST["password"]));
	$user->kind = 2;
	$user->estado = $_POST["estado"];

	$user->add();

	header("location: ./?view=profesores&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "upd") {

	$user = new UserData();

	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->email = $_POST["email"];

	$user->updateInfo();
	header("location: ./?view=profesores&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "del") {
	$user->id = $_GET["id"];
	$user->delEstudiante();
	header("location: ./?view=profesores&opt=all");
}
