<?php
class EstudiantesData {
	public static $tablename = "estudiantes";

	public function __construct(){
		$this->id_estudiante = "";
		$this->dni = "";
		$this->primer_apellido = "";
		$this->segundo_apellido = "";
		$this->nombre = "";
		$this->genero = "";
		$this->programa = "";
		$this->fecha_nac = "";
		$this->email = "";
		$this->estado = "";
		$this->fecha_reg = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			dni,
			primer_apellido,
			segundo_apellido,
			nombre,
			genero,
			programa,
			fecha_nac,
			email,
			estado,
			fecha_reg) ";
		$sql .= "value (
			\"$this->dni\",
			\"$this->primer_apellido\",
			\"$this->segundo_apellido\",
			\"$this->nombre\",
			\"$this->genero\",
			\"$this->programa\",
			\"$this->fecha_nac\",
			\"$this->email\",
			\"$this->estado\",
			\"$this->fecha_reg\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_estudiante=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		dni=\"$this->dni\",
		nombre=\"$this->nombre\",
		primer_apellido=\"$this->primer_apellido\",
		segundo_apellido=\"$this->segundo_apellido\",
		programa=\"$this->programa\",
		fecha_nac=\"$this->fecha_nac\",
		genero=\"$this->genero\",
		estado=\"$this->estado\",
		email=\"$this->email\"
		where id_estudiante=\"$this->id_estudiante\"";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_estudiante=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_estudiante=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EstudiantesData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EstudiantesData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstudiantesData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstudiantesData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstudiantesData());
	}


}

?>