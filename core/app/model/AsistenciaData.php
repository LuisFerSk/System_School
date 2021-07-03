<?php
class AsistenciaData
{
    public static $tablename = "asistencia";

    public function __construct()
    {
        $this->id = "";
        $this->grupo_estudiante = "";
        $this->tipo_asistencia = "";
        $this->fecha = "";
    }

    public function add()
    {
        $sql = "insert into " . self::$tablename . " (
			grupo_estudiante,
			tipo_asistencia,
			fecha) ";
        $sql .= "value (
			\"$this->grupo_estudiante\",
			\"$this->tipo_asistencia\",
			\"$this->fecha\")";
        return Executor::doit($sql);
    }

    public function del()
    {
        $sql = "delete from " . self::$tablename . " where id=$this->id";
        Executor::doit($sql);
    }

    public function update()
    {
        $sql = "update " . self::$tablename . " set 
		codigo=\"$this->grupo_asistencia\",
		nombre=\"$this->tipo_asistencia\",
		estado=\"$this->fecha\" 
		where id=$this->id";
        Executor::doit($sql);
    }

    public static function getById($id)
    {
        $sql = "select * from " . self::$tablename . " where id=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new AsistenciaData());
    }

    public static function getByGrupoEstudiante($grupo_estudiante)
    {
        $sql = "select * from " . self::$tablename . " where grupo_estudiante = $grupo_estudiante;";
        $query = Executor::doit($sql);
        return Model::one($query[0], new AsistenciaData());
    }

    public static function getByATD($grupo_estudiante, $fecha)
    {
        $sql = "select * from " . self::$tablename . " where grupo_estudiante = $grupo_estudiante and fecha = \"$fecha\";";
        $query = Executor::doit($sql);
        return Model::one($query[0], new AsistenciaData());
    }

    public static function getAll()
    {
        $sql = "select * from " . self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new AsistenciaData());
    }
}
