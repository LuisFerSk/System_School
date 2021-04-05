<?php
class Periodo_academicoData {
	public static $tablename = "a_academico";

	public function __construct(){
		$this->id_perido_academico = "";
		$this->nombre = "";
		$this->fecha_inicio = "";
		$this->fecha_fin = "";
		$this->inicio_matricula = "";
		$this->fin_matricula = "";
		$this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			nombre,
			fechainicio,
			fechafin,
			iniciomatricula,
			finmatricula,
			estado
		)";
		$sql .= "value (
			\"$this->nombre\",
			\"$this->fechainicio\",
			\"$this->fechafin\",
			\"$this->iniciomatricula\",
			\"$this->finmatricula\",
			\"$this->estado\"
		)";
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
		nombre=\"$this->nombre\",
		fechainicio=\"$this->fechainicio\",
		fechafin=\"$this->fechafin\",
		iniciomatricula=\"$this->iniciomatricula\",
		finmatricula=\"$this->finmatricula\",
		estado=\"$this->estado\" 
		where id_a=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_a=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_a=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Periodo_academicoData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Periodo_academicoData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Periodo_academicoData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Periodo_academicoData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Periodo_academicoData());
	}

}

