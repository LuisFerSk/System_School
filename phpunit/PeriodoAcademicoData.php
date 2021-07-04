<?php
class PeriodoAcademicoData
{
	public static $tablename = "perido_academico";

	public function __construct()
	{
		$this->id = "";
		$this->nombre = "";
		$this->fecha_inicio = "";
		$this->fecha_fin = "";
		$this->estado = "";
	}

	public function add()
	{
		$sql = "insert into " . self::$tablename . " (
			nombre,
			fecha_inicio,
			fecha_fin,
			estado
		) value (
			\"$this->nombre\",
			\"$this->fecha_inicio\",
			\"$this->fecha_fin\",
			\"$this->estado\"
		)";
		return Executor::doit($sql);
	}

	public function update()
	{
		$sql = "update " . self::$tablename . " set 
		nombre=\"$this->nombre\",
		fecha_inicio=\"$this->fecha_inicio\",
		fecha_fin=\"$this->fecha_fin\",
		estado=\"$this->estado\" 
		where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PeriodoAcademicoData());
	}

	public static function getByNombre($nombre)
	{
		$sql = "select * from " . self::$tablename . " where nombre=\"$nombre\"";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PeriodoAcademicoData());
	}

	public static function getAll()
	{
		$sql = "select * from " . self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0], new PeriodoAcademicoData());
	}
}
