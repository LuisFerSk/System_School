<?php
class GradData {
	public static $tablename = "grados";


	public function __construct(){
		$this->nombre = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}
	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,nivel,fav,id_prof) ";
		$sql .= "value (\"$this->nombre\",\"$this->nivel\",$this->fav,$this->id_prof)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_grado=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_grado=$this->id_grado";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto GradData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",nivel=\"$this->nivel\",fav=\"$this->fav\" where id_grado=$this->id_grado";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_grado=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GradData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradData());
	}

	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where id_prof=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradData());
	}

	public static function getFavoritesByUserId($id){
		$sql = "select * from ".self::$tablename." where id_prof=$id and fav=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradData());
	}


}

?>