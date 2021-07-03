<?php
class AsignaturaData
{
	public static $tablename = "asignatura";

	public function __construct()
	{
		$this->id = "";
		$this->codigo = "";
		$this->nombre = "";
		$this->estado = "";
	}

	public function add()
	{
		$sql = "insert into " . self::$tablename . " (
			codigo,
			nombre,
			estado) ";
		$sql .= "value (
			\"$this->codigo\",
			\"$this->nombre\",
			\"$this->estado\")";
		Executor::doit($sql);
	}

	public function del()
	{
		$sql = "delete from " . self::$tablename . " where id=$this->id";
		Executor::doit($sql);
	}

	public function update()
	{
		$sql = "update " . self::$tablename . " set 
		codigo=\"$this->codigo\",
		nombre=\"$this->nombre\",
		estado=\"$this->estado\" 
		where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new AsignaturaData());
	}

	public static function getByCodigo($codigo)
	{
		$sql = "select * from " . self::$tablename . " where codigo=\"$codigo\"";
		$query = Executor::doit($sql);
		return Model::one($query[0], new AsignaturaData());
	}

	public static function getAll()
	{
		$sql = "select * from " . self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0], new AsignaturaData());
	}
}
