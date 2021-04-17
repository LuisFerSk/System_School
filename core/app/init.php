<?php

if (isset($_SESSION["id"])) {
	Core::$user=UserData::getById($_SESSION["id"]);
}

if(!isset($_GET["action"])){
//	Bootload::load("default");
	Module::loadLayout("index");

}else{
	Action::load($_GET["action"]);
}
