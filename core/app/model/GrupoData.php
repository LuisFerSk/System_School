<?php
class GrupoData {
	public static $tablename = "grupo";

	public function __construct(){
		$this->id_grupo= "";
		$this->periodo = new PeriodoAcademicoData();
		$this->profesor = new ProfesorData();
		$this->list_estudiantes = list();
		$this->list_hora_clases = list();
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_grupo,periodo,profesor) ";
		$sql .= "value (\"$this->id_grupo\",\"$this->periodo->id_perido_academico\",\"$this->profesor->id_profesor\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_gra_cu=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set id=\"$this->id\" where id_gra_cu=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_gra_cu=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_gra_cu=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GrupoData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GrupoData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new GrupoData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GrupoData());
	}


	public static function getLike($q) {
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GrupoData());

	}


}

?>