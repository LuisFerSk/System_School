<?php
class UserData {
	public static $tablename = "usuarios";

	public function __construct(){
		$this->id_prof = "";
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->email = "";
		$this->password = "";
		$this->kind = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into usuarios (id_prof,name,lastname,username,email,password,created_at,kind) ";
		$sql .= "value (\"$this->id_prof\",\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->email\",\"$this->password\",$this->created_at,\"$this->kind\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",username=\"$this->username\",lastname=\"$this->lastname\",status=\"$this->status\",kind=\"$this->kind\" where id_prof=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id_prof=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_prof=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_prof=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>