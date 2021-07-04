<?php
class GrupoEstudianteQRData
{
	public static $tablename = "grupo_estudiante_qrs";

	public function __construct()
	{
		$this->id = "";
		$this->grupo_estudiante = "";
		$this->codigo_qr = "";
	}

	public function add()
	{
		$sql = "insert into " . self::$tablename . " (grupo_estudiante,codigo_qr) ";
		$sql .= "value ($this->grupo_estudiante,\"$this->codigo_qr\")";
		Executor::doit($sql);
	}

	public static function getByGrupoEstudiante($grupo_estudiante)
	{
		$sql = "select * from " . self::$tablename . " where grupo_estudiante = $grupo_estudiante";
		$query = Executor::doit($sql);
		return Model::one($query[0], new GrupoEstudianteQRData());
	}
}
