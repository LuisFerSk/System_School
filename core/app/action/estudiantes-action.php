<?php 
if (isset($_GET["opt"])&& $_GET["opt"]=="add") {

	$user=new UserData();

	$user->username = $_POST["username"];
	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->password = sha1(md5($_POST["password"]));
	$user->kind = 3;
	$user->estado = $_POST["estado"];

	$estudiante=new EstudianteData();

	$user->kind = $estudiante->tablename;

	$estudiante->username = $_POST["username"];
	$estudiante->programa = $_POST["programa"];
	$estudiante->estado = $_POST["estado"];

	$user->add();

	$estudiante->add();

	header("location: ./?view=estudiantes&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="upd") {

	$user=new UserData();

	$user->dni = $_POST["dni"];
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->password = sha1(md5($_POST["password"]));
	$user->estado = $_POST["estado"];

	$estudiante=new EstudianteData();

	$user->kind = $estudiante->tablename;

	$estudiante->programa = $_POST["programa"];
	$estudiante->estado = $_POST["estado"];

	$estudiante->update();
	$user->update();
	header("location: ./?view=estudiantes&opt=all");
}

else if (isset($_GET["opt"])&& $_GET["opt"]=="del") {
	$emi=new EstudianteData();
	$emi->id=$_GET["id"];
	$emi->del();
	header("location: ./?view=estudiantes&opt=all");
}
