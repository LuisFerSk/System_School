<?php
class ProgramaData {
	public static $tablename = "programa";

	public function __construct(){
		$this->id_programa = "";
		$this->nombre = "";
		$this->facultad = "";
		$this->numeroPeriodos = "";
		$this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			nombre,
			facultad,
			numeroPeriodos,
			estado) ";
		$sql .= "value (
			\"$this->nombre\",
			\"$this->facultad\",
			\"$this->numeroPeriodos\",
			\"$this->estado\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_programa=$this->id_programa";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		nombre=\"$this->nombre\",
		facultad=\"$this->facultad\",
		numeroPeriodos=\"$this->numeroPeriodos\",
		estado=\"$this->estado\" 
		where id_programa=$this->id_programa";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_grado=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_programa=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProgramaData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProgramaData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProgramaData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProgramaData());
	}
	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where id_prof=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProgramaData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProgramaData());
	}


}

?>