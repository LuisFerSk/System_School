<?php
class ProfesoresData {
	public static $tablename = "profesores";

	public function __construct(){
		$this->dni = "";
		$this->nombres = "";
		$this->num_cel = "";
		$this->especialidad = "";
		$this->email = "";
		$this->direccion = "";

	}

	public function add(){
		$sql = "insert into ".self::$tablename." (dni,nombres,apellidos,especialidad,num_cel,email,direccion) ";
		$sql .= "value (\"$this->dni\",\"$this->nombres\",\"$this->apellidos\",\"$this->especialidad\",\"$this->num_cel\",\"$this->email\",\"$this->direccion\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_prof=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombres=\"$this->nombres\",apellidos=\"$this->apellidos\",especialidad=\"$this->especialidad\",dni=\"$this->dni\",num_cel=\"$this->num_cel\",email=\"$this->email\",direccion=\"$this->direccion\" where id_prof=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_prof=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_prof=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfesoresData());
	}

		public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where id_prof=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfesoresData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfesoresData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfesoresData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfesoresData());
	}


}

?>