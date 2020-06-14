<?php
class FacultadData {
	public static $tablename = "facultad";

	public function __construct(){
		$this->id_facultad = "";
    $this->nombre = "";
    $this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,estado) ";
		$sql .= "value (\"$this->nombre\",\"$this->estado\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_facultad=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",estado=\"$this->estado\" where id_facultad=$this->id_facultad";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_facultad=$this->id_facultad";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_facultad=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FacultadData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FacultadData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FacultadData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FacultadData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FacultadData());
	}


}

?>