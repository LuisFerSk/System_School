<?php
class KindData
{
    public static $tablename = "kind_user";

    public function __construct()
    {
        $this->id = "";
        $this->id_user = "";
        $this->id_kind = "";
    }

    public function add()
    {
        $sql = "insert into " . self::$tablename . " (
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
        $sql = "delete from " . self::$tablename . " where id=$this->id and kind = 3";
        Executor::doit($sql);
    }

    public function delEstudiante()
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
		kind=\"$this->kind\" ,
		estado=\"$this->estado\"
		where id=$this->id";
        Executor::doit($sql);
    }

    public function updateInfo()
    {
        $sql = "update " . self::$tablename . " set 
		dni=\"$this->dni\",
		email=\"$this->email\",
		nombre=\"$this->nombre\",
		apellidos=\"$this->apellidos\",
		estado=\"$this->estado\"
		where id=$this->id";
        Executor::doit($sql);
    }

    public static function getById($id_user)
    {
        $sql = "select * from " . self::$tablename . " where id_user = $id_user";
        $query = Executor::doit($sql);
        return Model::many($query[0], new KindData());
    }

    public static function getAllProfesor()
	{
		$sql = "select * from  " . self::$tablename . " where id_kind like '%2%'";
		$query = Executor::doit($sql);
		return Model::many($query[0], new UserData());
	}

    public static function getAll()
    {
        $sql = "select * from " . self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new KindData());
    }

    public static function getAllBy($k, $v)
    {
        $sql = "select * from " . self::$tablename . " where $k=\"$v\"";
        $query = Executor::doit($sql);
        return Model::many($query[0], new KindData());
    }
}
