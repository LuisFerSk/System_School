<?php

class ProfesorData {

    public static $tablename = "profesores";

    public function __construct(){
        $this->id = "";
        $this->username = "";
        $this->estado = "";
    }
    

    public function add() {
        $sql = "insert into " . self::$tablename . " (
			username,
			estado)";
    
        $sql .= "value (
			\"$this->username\",
			\"$this->estado\")";
        Executor::doit($sql);
    }

    public function del() {
        $sql = "delete from " . self::$tablename . " where id=$this->id";
        Executor::doit($sql);
    }

    public static function delBy($k, $v) {
        $sql = "delete from " . self::$tablename . " where $k=\"$v\"";
        Executor::doit($sql);
    }

    public function update() {
        $sql = "update " . self::$tablename . " set  
		username=\"$this->username\",  
		estado=\"$this->estado\" 
		where id=\"$this->id\"";
        Executor::doit($sql);
    }

    public function updateById($k, $v) {
        $sql = "update " . self::$tablename . " set $k=\"$v\" where id=$this->id";
        Executor::doit($sql);
    }

    public static function getById($id) {
        $sql = "select * from " . self::$tablename . " where id=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new ProfesorData());
    }

    public static function getAllByUserId($id) {
        $sql = "select * from " . self::$tablename . " where id=$id";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesorData());
    }

    public static function getBy($k, $v) {
        $sql = "select * from " . self::$tablename . " where $k=\"$v\"";
        $query = Executor::doit($sql);
        return Model::one($query[0], new ProfesorData());
    }

    public static function getAll() {
        $sql = "select * from " . self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesorData());
    }

    public static function getAllBy($k, $v) {
        $sql = "select * from " . self::$tablename . " where $k=\"$v\"";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesorData());
    }

    public static function getLike($q) {
        $sql = "select * from " . self::$tablename . " where name like '%$q%'";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ProfesorData());
    }

}
