<?php
class Sesiones_acData {
	public static $tablename = "sesiones";

	public function __construct(){
		$this->id_nomina = "";
		$this->id_prof = "";
		$this->id_curso = "";
		$this->asistencia = "";
		$this->fecha_reg = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_nomina,id_prof,id_curso,asistencia,fecha_reg) ";
		$sql .= "value (\"$this->id_nomina\",\"$this->id_prof\",\"$this->id_curso\",\"$this->asistencia\",\"$this->fecha_reg\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_sesion=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id_sesion=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_sesion=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_sesion=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Sesiones_acData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Sesiones_acData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Sesiones_acData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Sesiones_acData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Sesiones_acData());
	}


}

?>