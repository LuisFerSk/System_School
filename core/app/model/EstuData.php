<?php
class EstuData {
	public static $tablename = "estudiantes";
	public function __construct(){
		$this->title = "";
		$this->genero = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->fecha_reg = "NOW()";
	}



	public function add(){
		$sql = "insert into ".self::$tablename." (dni,nombre,apellido_paterno,apellido_materno,direccion,num_cel,genero,user_id,fecha_reg,apoderado,estado,fecha_nac) ";
		$sql .= "value (\"$this->dni\",\"$this->nombre\",\"$this->apellido_paterno\",\"$this->apellido_materno\",\"$this->direccion\",\"$this->num_cel\",\"$this->genero\",$this->user_id,$this->fecha_reg,\"$this->apoderado\",\"$this->estado\",\"$this->fecha_nac\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_estudiante=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_estudiante=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto EstuData previamente utilizamos el contexto
	public function update_active(){
		$sql = "update ".self::$tablename." set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tablename." set dni=\"$this->dni\",nombre=\"$this->nombre\",apellido_paterno=\"$this->apellido_paterno\",apellido_materno=\"$this->apellido_materno\",direccion=\"$this->direccion\",num_cel=\"$this->num_cel\",genero=\"$this->genero\",apoderado=\"$this->apoderado\",estado=\"$this->estado\",fecha_nac=\"$this->fecha_nac\" where id_estudiante=$this->id_estudiante";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_estudiante=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EstuData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha_reg desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstuData());
	}


	public static function getAllUnActive(){
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstuData());
	}


	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or genero like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EstuData());
	}


}

?>