<?php
class GeneroData {
	public static $tablename = "genero";

	public function __construct(){
		$this->genero = "";
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_genero=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GeneroData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new GeneroData());
	}

}

?>