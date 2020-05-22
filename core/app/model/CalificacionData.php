<?php
class CalificacionData {
	public static $tablename = "notas";

 
	public function __construct(){
		$this->id_estudiante = "";
		$this->id_bloque = "";
		$this->nota = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_estudiante,id_bloque,nota) ";
		$sql .= "value ($this->id_estudiante,$this->id_bloque,\"$this->nota\")";
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

// partiendo de que ya tenemos creado un objecto CalificacionData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nota=\"$this->nota\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CalificacionData());
	}

	public static function getByBA($block,$alumn){
		$sql = "select * from ".self::$tablename." where id_estudiante=$alumn and id_bloque=$block";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CalificacionData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CalificacionData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CalificacionData());
	}


}

?>