<?php 
class GrupoData {
	public static $tablename = "gra_cu";

	public function __construct(){
		$this->codigo= "s";
		$this->periodo = "";
		$this->profesor = "";
	}
}
$hola = new GrupoData();
$l = array();
array_push($l,$hola);

foreach ($l as $valor) {
    print($valor->codigo);
}