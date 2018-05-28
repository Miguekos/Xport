<?php
class MemData {
	public static $tablename = "membresia";


	public function __construct(){
		
		
	}

	public function add(){
		$sql = "INSERT INTO membresia(nombre, tiempo_de_la_membresia, precio, agregado, nota) VALUES ('$this->nombre','$this->tiempo_de_la_membresia','$this->precio','$this->agregado','$this->nota')";
		return Executor::doit($sql);
	}

	public function add2(){
		$sql = "insert into membresia (image,name,lastname,email,username,password,kind,created_at) ";
		$sql .= "value (\"$this->image\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->kind,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delete($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto MemData previamente utilizamos el contexto
	public function update(){
		$sql = "update membresia set `nombre`='$this->nombre',`tiempo_de_la_membresia`='$this->tiempo_de_la_membresia',`precio`='$this->precio',`agregado`='$this->agregado',`nota`='$this->nota' where id=$this->id";
		Executor::doit($sql);
	}
	public function update_control(){
		$sql = "update membresia set `nombre`='$this->nombre',`apellido`='$this->apellido',`fecha_inicio`='$this->fecha_inicio',`fecha_fin`='$this->fecha_fin',`monto`='$this->monto',`pago`='$this->pago',`deuda`='$this->deuda',`nota`='$this->nota',`atendido`='$this->atendido' where id=$this->id";
		Executor::doit($sql);
	}

		public function update_profile(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",bio=\"$this->bio\",address=\"$this->address\",phone=\"$this->phone\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function update_email(){
		$sql = "update ".self::$tablename." set email=\"$this->email\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function update_img(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function activate(){
		$sql = "update ".self::$tablename." set is_active=1 where id=$this->id";	
	Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MemData());
	}

	public static function getByName($nombre){
		$sql = "select * from ".self::$tablename." where nombre=$nombre";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MemData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MemData());
	}

	public static function getByDni($dni){
		$sql = "select * from ".self::$tablename." where dni=\"$dni\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MemData());
	}

	public static function getLogin($email,$password){
		$sql = "select * from ".self::$tablename." where email=\"$email\" and password=\"$password\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new MemData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new MemData());

	}

	public static function getInactives(){
		$sql = "select * from ".self::$tablename." where is_active=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MemData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MemData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new MemData());
	}

}

?>