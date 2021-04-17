<?php
class GrupoData {
	public static $tablename = "grupo";

	public function __construct(){
		$this->id= "";
		$this->perido = "";
		$this->profesor = "";
		$this->list_estudiantes = array();
		$this->list_hora_clases = array();
		$this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_grupo,periodo,profesor) ";
		$sql .= "value (\"$this->id\",\"$this->periodo\",\"$this->profesor\",\"$this->estado\")";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set
			periodo=\"$this->periodo\",
			profesor=\"$this->profesor\",
			estado=\"$this->estado\"
			where id=$this->id";
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
