<?php
class UserData
{
	public static $tablename = "user";

	public function __construct()
	{
		$this->id = "";
		$this->email = "";
		$this->dni = "";
		$this->nombre = "";
		$this->apellidos = "";
		$this->password = "";
		$this->kind = "";
		$this->estado = "";
	}

	public function add()
	{
		$sql = "insert into \"$this->tablename\" (
			email,
			dni,
			nombre,
			apellidos,
			password,
			kind,
			estado) value (
			\"$this->email\",
			\"$this->dni\",
			\"$this->nombre\",
			\"$this->apellidos\",
			\"$this->password\",
			\"$this->kind\",
			\"$this->estado\")";
		Executor::doit($sql);
	}

	public function del()
	{
		$sql = "delete from " . self::$tablename . " where id=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k, $v)
	{
		$sql = "delete from " . self::$tablename . " where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update()
	{
		$sql = "update " . self::$tablename . " set 
		dni=\"$this->dni\",
		nombre=\"$this->nombre\",
		apellidos=\"$this->apellidos\",
		password=\"$this->password\",
		kind=\"$this->kind\" 
		where id=$this->id";
		Executor::doit($sql);
	}

	public function updateInfo()
	{
		$sql = "update " . self::$tablename . " set 
		dni=\"$this->dni\",
		email=\"$this->email\",
		nombre=\"$this->nombre\",
		apellidos=\"$this->apellidos\" 
		where dni=$this->dni";
		Executor::doit($sql);
	}

	public function update_passwd()
	{
		$sql = "update " . self::$tablename . " set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new UserData());
	}

	public static function getByDni($dni)
	{
		$sql = "select * from " . self::$tablename . " where dni=\"$dni\"";
		$query = Executor::doit($sql);
		return Model::one($query[0], new UserData());
	}

	public static function getAll()
	{
		$sql = "select * from " . self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0], new UserData());
	}

	public static function getAllProfesor()
	{
		$sql = "select * from  " . self::$tablename . " where kind = 2";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UserData());
	}

	public static function getAllBy($k, $v)
	{
		$sql = "select * from " . self::$tablename . " where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UserData());
	}

	public function verificar()
	{
		$sql = "select * from " . self::$tablename . " where email=\"$this->email\"and password=\"$this->password\"";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UserData());
	}
}
