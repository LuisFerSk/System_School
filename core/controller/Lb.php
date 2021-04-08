<?php
class Lb {

	public function __construct(){
	}

	public function start(){
		if(isset($_GET)){
			foreach($_GET as $k=>$v){
				Core::$get[$k]=$v;
			}
		}
		if(isset($_POST)){
			foreach($_POST as $k=>$v){
				Core::$post[$k]=$v;
			}
		}
		include "core/app/autoload.php";
		include "core/app/init.php";
	}
}
