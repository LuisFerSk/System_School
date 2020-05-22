<?php
class NominaData {
	public static $tablename = "nomina";

	public function __construct(){
		$this->id_estudiante = "";
		$this->id_grado = "";
		$this->id_a = "";
		$this->fecha = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_estudiante,id_grado,id_a,fecha) ";
		$sql .= "value (\"$this->id_estudiante\",\"$this->id_grado\",\"$this->id_a\",\"$this->fecha\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_nomina=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->\" where id_nomina=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_nomina=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_nomina=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new NominaData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new NominaData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new NominaData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NominaData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NominaData());
	}


}

?>