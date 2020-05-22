<?php
class AssistanceData {
	public static $tablename = "asistencias";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->fecha = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (fecha,id_estudiante,id_grado,tipo) ";
		$sql .= "value (\"$this->fecha\",$this->id_estudiante,$this->id_grado,$this->tipo)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto AssistanceData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set tipo=\"$this->tipo\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AssistanceData());
	}

	public static function getByATD($alumn,$team,$fecha){
		$sql = "select * from ".self::$tablename." where id_estudiante=$alumn and id_grado=$team and fecha=\"$fecha\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AssistanceData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AssistanceData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AssistanceData());
	}


}

?>