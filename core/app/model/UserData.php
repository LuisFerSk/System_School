<?php
class UserData {
	public static $tablename = "User";

	public function __construct(){
		$this->id = "";
		$this->username = "";
		$this->dni = "";
		$this->nombre = "";
		$this->apellidos = "";
		$this->password = "";
		$this->kind = "";
		$this->estado = "";
	}

	public function add(){
		$sql = "insert into \"$this->tablename\" (username,dni,nombre,apellidos,password,kind)";
		$sql .= "value (
			\"$this->username\",
			\"$this->dni\",
			\"$this->nombre\",
			\"$this->apellidos\",
			\"$this->password\",
			\"$this->kind\")";
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
		$sql = "update ".self::$tablename." set 
		dni=\"$this->dni\",
		nombre=\"$this->nombre\",
		apellidos=\"$this->apellidos\",
		password=\"$this->password\",
		kind=\"$this->kind\" 
		where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByUsername($username){
		$sql = "select * from ".self::$tablename." where username=\"$username\"";
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

	public function verificar(){
		$sql = "select * from ".self::$tablename." where username=\"$this->username\"and password=\"$this->passwrod\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
}
