<?php
class Plan_estudioData {
	public static $tablename = "plan_estudio";

	public function __construct(){
		$this->id_plan = "";
		$this->codigo = "";
    $this->programa = "";
		$this->estado = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			codigo,
			nombre,
			programa,
			estado) ";
		$sql .= "value (
			\"$this->codigo\",
			\"$this->nombre\",
			\"$this->programa\",
			\"$this->estado\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_plan=$this->id_plan";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		codigo=\"$this->codigo\",
		nombre=\"$this->nombre\",
		programa=\"$this->programa\",
		estado=\"$this->estado\" 
		where id_plan=$this->id_plan";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_plan=$this->id_plan";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_plan=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Plan_estudioData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Plan_estudioData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Plan_estudioData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Plan_estudioData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Plan_estudioData());
	}

}
/*/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/*/
class Asignatura_planData 
{
  public static $tablename = "asignatura_plan";

	public function __construct(){
		$this->id_asig_plan  = "";
		$this->plan = "";
    $this->asignatura = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			plan,
			asignatura) ";
		$sql .= "value (
			\"$this->plan\",
			\"$this->asignatura\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_asig_plan=$this->id_asig_plan";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		plan=\"$this->plan\",
		asignatura=\"$this->asignatura\" 
		where id_asig_plan=$this->id_asig_plan";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_asig_plan=$this->id_asig_plan";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_asig_plan=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Asignatura_planData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Asignatura_planData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Asignatura_planData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Asignatura_planData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Asignatura_planData());
	}
}
/*/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/*/
class Asig_plan_reqData
{
  public static $tablename = "asig_plan_requisito";

	public function __construct(){
		$this->id_asig_plan_req  = "";
		$this->asig_plan = "";
    $this->asignatura = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (
			asig_plan,
			asignatura) ";
		$sql .= "value (
			\"$this->asig_plan\",
			\"$this->asignatura\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_asig_plan_req=$this->id_asig_plan_req";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set 
		asig_plan=\"$this->asig_plan\",
		asignatura=\"$this->asignatura\" 
		where id_asig_plan=$this->id_asig_plan";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_asig_plan_req=$this->id_asig_plan_req";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_asig_plan_req=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Asig_plan_reqData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Asig_plan_reqData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Asig_plan_reqData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Asig_plan_reqData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Asignatura_planData());
	}
}
