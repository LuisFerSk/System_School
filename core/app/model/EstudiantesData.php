<?php
class EstudiantesData {
	public static $tablename = "estudiantes";

	public function __construct(){
		$this->dni = "";
		$this->apellido_paterno = "";
		$this->apellido_materno = "";
		$this->nombre = "";
		$this->genero = "";
		$this->apoderado = "";
		$this->num_cel = "";
		$this->fecha_nac = "";
		$this->direccion = "";
		$this->estado = "";
		$this->fecha_reg = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (dni,apellido_paterno,apellido_materno,nombre,genero,apoderado,num_cel,fecha_nac,direccion,estado,fecha_reg) ";
		$sql .= "value (\"$this->dni\",\"$this->apellido_paterno\",\"$this->apellido_materno\",\"$this->nombre\",\"$this->genero\",\"$this->apoderado\",\"$this->num_cel\",\"$this->fecha_nac\",\"$this->direccion\",\"$this->estado\",\"$this->fecha_reg\")";
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
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",apellido_paterno=\"$this->apellido_paterno\",apellido_materno=\"$this->apellido_materno\",apoderado=\"$this->apoderado\",fecha_nac=\"$this->fecha_nac\",genero=\"$this->genero\",dni=\"$this->dni\",num_cel=\"$this->num_cel\",estado=\"$this->estado\",direccion=\"$this->direccion\" where id_estudiante=$this->id";
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