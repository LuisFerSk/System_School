<?php
class Est_graData {
	public static $tablename = "est_gra";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getAlumn(){ return EstuData::getById($this->id_estudiante); }
	public function getTeam(){ return GradData::getById($this->id_grado); }

	public function add(){
		$sql = "insert into ".self::$tablename." (id_estudiante,id_grado) ";
		$sql .= "value (\"$this->id_estudiante\",$this->id_grado)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_estudiante=$this->id_estudiante and id_grado=$this->id_grado";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto Est_graData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Est_graData());
	}

	public static function getByAT($a,$t){
		$sql = "select * from ".self::$tablename." where id_estudiante=$a and id_grado=$t";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Est_graData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Est_graData());

	}

		public static function getAllByTeamId($id){
		$sql = "select * from ".self::$tablename." where id_grado=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Est_graData());
	}

		public static function getAllByAlumnId($id){
		$sql = "select * from ".self::$tablename." where id_estudiante=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Est_graData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Est_graData());
	}


}

?>