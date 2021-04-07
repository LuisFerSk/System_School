<?php
class GrupoData {
	public static $tablename = "grupo";

	public function __construct(){
		$this->id= "";
		$this->perido = "";
		$this->profesor = "";
		$this->list_estudiantes = list();
		$this->list_hora_clases = list();
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_grupo,periodo,profesor) ";
		$sql .= "value (\"$this->id\",\"$this->periodo\",\"$this->profesor\")";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set (periodo=\"$this->periodo\",profesor=\"$this->profesor\") where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GrupoData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new GrupoData());
	}

}
