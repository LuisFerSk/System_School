<?php
class AsistenciaData {
	public static $tablename = "asistencias";

	public function __construct(){
		$this->nombre = "";
		$this->fecha = "";
		$this->id_curso = "";
		$this->id_nomina = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,fecha,id_curso,id_nomina) ";
		$sql .= "value (\"$this->nombre\",\"$this->fecha\",\"$this->id_curso\",\"$this->id_nomina\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_asistencia=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",fecha=\"$this->fecha\" where id_asistencia=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_asistencia=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_asistencia=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AsistenciaData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AsistenciaData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsistenciaData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsistenciaData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsistenciaData());
	}


}

?>