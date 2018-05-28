<?php
class EmpleadosData {
	public static $tablename = "empleados";


	public function EmpleadosData(){
		$this->id = "";
		$this->nombre = "";
		$this->apellido = "";
		$this->dni = "";
		$this->email = "";
		$this->boleta = "";
		$this->fecha_inicio = "";
		$this->fecha_fin = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "INSERT INTO empleados (nombre, apellido, domicilio, email, telf, dni, edad, sexo, boleta, membresia, fecha_inicio, fecha_fin, monto, pago, deuda, forma_pago, nota, atendido, contrato, gymxdias) VALUES ('$this->nombre','$this->apellido','$this->domicilio','$this->email','$this->telf','$this->dni','$this->edad','$this->sexo','$this->boleta','$this->membresia','$this->fecha_inicio','$this->fecha_fin','$this->monto','$this->pago','$this->deuda','$this->forma_pago','$this->nota','$this->atendido','$this->contrato','$this->gymxdias')";
		return Executor::doit($sql);
	}

	public function add_prueba(){
		$sql = "INSERT INTO empleados (nombre, apellido, dni, edad, sexo, nota, fecha_inicio, cargo) VALUES ('$this->nombre','$this->apellido','$this->dni','$this->edad','$this->sexo','$this->nota','$this->fecha_inicio','$this->cargo')";
		return Executor::doit($sql);
	}

	public function add2(){
		$sql = "insert into empleados (image,name,lastname,email,username,password,kind,created_at) ";
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

// partiendo de que ya tenemos creado un objecto EmpleadosData previamente utilizamos el contexto
	public function update(){
		$sql = "update empleados set `nombre`='$this->nombre',`apellido`='$this->apellido',`domicilio`='$this->domicilio',`email`='$this->email',`telf`='$this->telf',`dni`='$this->dni',`edad`='$this->edad',`sexo`='$this->sexo',`boleta`='$this->boleta',`membresia`='$this->membresia',`fecha_inicio`='$this->fecha_inicio',`fecha_fin`='$this->fecha_fin',`monto`='$this->monto',`pago`='$this->pago',`deuda`='$this->deuda',`forma_pago`='$this->forma_pago',`nota`='$this->nota',`contrato`='$this->contrato',`gymxdias`='$this->gymxdias' where id=$this->id";
		Executor::doit($sql);
	}

	public function update_profile(){
		$sql = "update empleados set `nombre`='$this->nombre',`apellido`='$this->apellido',`domicilio`='$this->domicilio',`email`='$this->email',`telf`='$this->telf',`dni`='$this->dni',`edad`='$this->edad',`sexo`='$this->sexo',`boleta`='$this->boleta',`membresia`='$this->membresia',`fecha_inicio`='$this->fecha_inicio',`fecha_fin`='$this->fecha_fin',`monto`='$this->monto',`pago`='$this->pago',`forma_pago`='$this->forma_pago',`nota`='$this->nota',`contrato`='$this->contrato',`deuda`='$this->deuda',`gymxdias`='$this->gymxdias' where id=$this->id";
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
		return Model::one($query[0],new EmpleadosData());
	}

	public static function getByName($nombre){
		$sql = "select * from ".self::$tablename." where nombre=$nombre";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpleadosData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpleadosData());
	}

	public static function getByDni($dni){
		$sql = "select * from ".self::$tablename." where dni=\"$dni\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpleadosData());
	}

	public static function getLogin($email,$password){
		$sql = "select * from ".self::$tablename." where email=\"$email\" and password=\"$password\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpleadosData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EmpleadosData());

	}

	public static function getInactives(){
		$sql = "select * from ".self::$tablename." where is_active=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EmpleadosData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EmpleadosData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EmpleadosData());
	}

}

?>