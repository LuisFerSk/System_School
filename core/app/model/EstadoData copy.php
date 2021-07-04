<?php
class EstadoData {
	public static $tablename = "estado";

	public function __construct(){
		$this->nombre = "";
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EstadoData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstadoData());
	}

}

?>