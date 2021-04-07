<?php
class FacultadData {
	public static $tablename = "facultad";

	public function __construct(){
		$this->id = "";
    	$this->nombre = "";
    	$this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,estado) ";
		$sql .= "value (\"$this->nombre\",\"$this->estado\")";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		nombre=\"$this->nombre\",
		estado=\"$this->estado\" 
		where id_facultad=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_facultad=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FacultadData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FacultadData());
	}
}
