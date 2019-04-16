<?php


class ClientData {
	public static $tablename = "cliente";



	public function __construct(){
		$this->id = "";
		$this->nombre = "";
		$this->apellido = "";
		$this->dni = "";
		$this->email = "";
		$this->abono = "";
		$this->boleta = "";
		$this->fecha_inicio = "";
		$this->fecha_fin = "";
		$this->fecha_alert = "";
	}

	public function add(){
		$sql = "INSERT INTO cliente (nombre, domicilio, telf, dni, nombre_mem, tiempo_mem, boleta, membresia_c, fecha_inicio, fecha_fin, fecha_alert, monto, deuda, nota, atendido,update_at) VALUES ('$this->nombre','$this->domicilio','$this->telf','$this->dni','$this->nombre_mem','$this->tiempo_mem','$this->boleta','$this->membresia_c','$this->fecha_inicio','$this->fecha_fin','$this->fecha_alert','$this->monto','$this->monto','$this->nota','$this->atendido','$this->update_at')";
		// echo $sql;
		return Executor::doit($sql);

	}

	public function add2(){
		$sql = "INSERT INTO cliente (id_abono, nombre, dni, fecha_fin, abono, total, fecha_abono)";
		$sql .= "VALUES (\"$this->id_abono\",\"$this->nombre\",\"$this->dni\",\"$this->fecha_fin\"\"$this->abono\",\"$this->total\",\"$this->fecha_abono\")";
		// echo $sql;
		return Executor::doit($sql);
	}

	// public function add2(){
	// 	$sql = "insert into cliente (image,name,lastname,email,username,password,kind,created_at) ";
	// 	$sql .= "value (\"$this->image\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->kind,$this->created_at)";
	// 	return Executor::doit($sql);
	// }

	public static function delete($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ClientData previamente utilizamos el contexto
	public function update(){
		$sql = "update cliente set `nombre`='$this->nombre',`apellido`='$this->apellido',`domicilio`='$this->domicilio',`telf`='$this->telf',`dni`='$this->dni',`nombre_mem`='$this->nombre_mem',`tiempo_mem`='$this->tiempo_mem',`boleta`='$this->boleta',`membresia_c`='$this->membresia_c',`fecha_inicio`='$this->fecha_inicio',`fecha_fin`='$this->fecha_fin',`fecha_alert`='$this->fecha_alert',`monto`='$this->monto',`pago`='$this->pago',`deuda`='$this->deuda',`forma_pago`='$this->forma_pago',`nota`='$this->nota',`contrato`='$this->contrato' where id=$this->id";
		//echo $sql;
		Executor::doit($sql);
	}
	public function update_control(){
		$sql = "update cliente set `nombre`='$this->nombre',`apellido`='$this->apellido',`fecha_fin`='$this->fecha_fin',`monto`='$this->monto',`pago`='$this->pago',`abono`='$this->abono',`deuda`='$this->deuda',`nota`='$this->nota',`atendido`='$this->atendido',`id_abono`='$this->id_abono',`update_at`='$this->update_at' where id=$this->id";
		// echo $sql;
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
		return Model::one($query[0],new ClientData());
	}

	public static function getByName($nombre){
		$sql = "select * from ".self::$tablename." where nombre=$nombre";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClientData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClientData());
	}

	public static function getByDni($dni){
		$sql = "select * from ".self::$tablename." where dni=\"$dni\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClientData());
	}

	public static function getLogin($email,$password){
		$sql = "select * from ".self::$tablename." where email=\"$email\" and password=\"$password\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClientData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClientData());

	}

	public static function getInactives(){
		$sql = "select * from ".self::$tablename." where is_active=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClientData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClientData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClientData());
	}

}

?>
