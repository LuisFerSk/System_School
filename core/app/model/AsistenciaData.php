<?php
class AsistenciaData
{
    public static $tablename = "asistencia";

    public function __construct()
    {
        $this->id = "";
        $this->grupo_asistencia = "";
        $this->tipo_asistencia = "";
        $this->fecha = "";
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
        return Model::one($query[0], new AsistenciaData());
    }

    public static function getByGrupoEstudiante($grupo_asistencia)
    {
        $sql = "select * from " . self::$tablename . " where grupo_asistencia = \"$grupo_asistencia\";";
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
