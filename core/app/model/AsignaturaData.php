<?php
class AsignaturaData {
	public static $tablename = "asignatura";

	public function __construct(){
		$this->id_asig = "";
		$this->codigo = "";
    $this->nombre = "";
    $this->creditos = "";
    $this->horas_semanales = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			codigo,
			nombre,
			creditos,
			horas_semanales) ";
		$sql .= "value (
			\"$this->codigo\",
			\"$this->nombre\",
			\"$this->creditos\",
			\"$this->horas_semanales\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_a=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		codigo=\"$this->codigo\",
		nombre=\"$this->nombre\",
		creditos=\"$this->creditos\",
		horas_semanales=\"$this->horas_semanales\" 
		where id_a=$this->id_asig";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_a=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_a=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AsignaturaData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AsignaturaData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsignaturaData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsignaturaData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsignaturaData());
	}

}

