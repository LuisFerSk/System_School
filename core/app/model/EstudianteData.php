<?php
class EstudianteData{
	public static $tablename = "estudiante";

	public function __construct(){
		$this->id = "";
		$this->dni = "";
		$this->programa = "";
		$this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			dni,
			programa,
			estado) ";
		$sql .= "value (
			\"$this->dni\",
			\"$this->programa\",
			\"$this->estado\");";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		programa=\"$this->programa\",
		dni=\"$this->dni\",
		estado=\"$this->estado\"
		where dni=\"$this->dni\"";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EstudianteData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstudianteData());
	}
}