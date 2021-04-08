<?php
if (isset($_GET["opt"])&& $_GET["opt"]=="login") {
	if ($_POST["username"]!= ""&&$_POST["password"]!="") {
		$user = new UserData();
		$user->username = $_POST["username"];
		$user->password = $_POST["password"];
		$user->verificar();

		$_SESSION["id"]=$user->id;
		$_SESSION["kind"]=$user->kind;
	}else
	Core::alert("Datos Vacios");
	Core::redir("./");
}
if (isset($_GET["opt"])&&$_GET["opt"]=="logout") {
	session_destroy();
	Core::redir("./");
}
