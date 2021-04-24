<?php
class View {
	public static function load($view){

		if(!isset($_GET['view'])){
			include "core/app/view/".$view."-view.php";
		}else{


			if(View::isValid()){
				include "core/app/view/".$_GET['view']."-view.php";				
			}else{
				View::Error("<b>404 NOT FOUND</b> View <b>".$_GET['view']."</b> folder !! - <a href='http://evilnapsis.com/legobox/help/' target='_blank'>Help</a>");
			}
		}
	}

	public static function load_subview(){

		if(isset($_GET['view'])!="" && isset($_GET["sb"])!=""){
			if(View::isValid()){
				$sb_src = "core/app/subview/".$_GET["view"].".".$_GET["sb"].".php";
				if(file_exists($sb_src)){
					include $sb_src;
				}else{
					View::Error("<p class='alert alert-warning'>File not found <i>".$sb_src."</i></p>");
				}
			}
		}
	}

	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			if(file_exists($file = "core/app/view/".$_GET['view']."-view.php")){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

}
