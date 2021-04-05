<?php

class ProfesoresData {

    public static $tablename = "profesores";

    public function __construct(){
        $this->id_profesor = "";
        $this->dni = "";
        $this->nombres = "";
        $this->primer_apelldio = "";
        $this->segundo_apellido = "";
        $this->email = "";
        $this->estado = "";
    }
    

    public function add() {
        $sql = "insert into " . self::$tablename . " (
			dni,
			nombres,
			primer_apellido,
			segundo_apellido,
			email,
			estado) ";
    
        $sql .= "value (
			\"$this->dni\",
			\"$this->nombres\",
			\"$this->getId_prof()\",
			\"$this->segundo_apellido\",
			\"$this->email\",
			\"$this->estado\")";
        Executor::doit($sql);
    }

    public function del() {
        $sql = "delete from " . self::$tablename . " where id_prof=$this->id";
        Executor::doit($sql);
    }

    public static function delBy($k, $v) {
        $sql = "delete from " . self::$tablename . " where $k=\"$v\"";
        Executor::doit($sql);
    }

    public function update() {
        $sql = "update " . self::$tablename . " set  
		nombres=\"$this->nombres\", 
		primer_apellido=\"$this->primer_apellido\", 
		segundo_apellido=\"$this->segundo_apellido\", 
		dni=\"$this->dni\", 
		email=\"$this->email\", 
		estado=\"$this->estado\" 
		where id_prof=\"$this->id_prof\"";
        Executor::doit($sql);
    }

    public function updateById($k, $v) {
        $sql = "update " . self::$tablename . " set $k=\"$v\" where id_prof=$this->id";
        Executor::doit($sql);
    }

    public static function getById($id) {
        $sql = "select * from " . self::$tablename . " where id_prof=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new ProfesoresData());
    }

    public static function getAllByUserId($id) {
        $sql = "select * from " . self::$tablename . " where id_prof=$id";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesoresData());
    }

    public static function getBy($k, $v) {
        $sql = "select * from " . self::$tablename . " where $k=\"$v\"";
        $query = Executor::doit($sql);
        return Model::one($query[0], new ProfesoresData());
    }

    public static function getAll() {
        $sql = "select * from " . self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesoresData());
    }

    public static function getAllBy($k, $v) {
        $sql = "select * from " . self::$tablename . " where $k=\"$v\"";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesoresData());
    }

    public static function getLike($q) {
        $sql = "select * from " . self::$tablename . " where name like '%$q%'";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesoresData());
    }

}
