<?php
class GradosData {
	public static $tablename = "grados";

	public function __construct(){
		$this->nombre = "";
		$this->nivel = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,nivel) ";
		$sql .= "value (\"$this->nombre\",\"$this->nivel\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_grado=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id_grado=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_grado=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_grado=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GradosData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GradosData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}
	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where id_prof=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}


}

?>