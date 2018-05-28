<?php
class GymData {
	public static $tablename = "cliente";


	// public function GymData(){
	// 	$this->name = "";
	// 	$this->lastname = "";
	// 	$this->email = "";
	// 	$this->password = "";
	// 	$this->status = "";
	// 	$this->created_at = "NOW()";
	// }

	public function suma(){
		$sql = "SELECT SUM(pago) as total_suma FROM cliente";
		#$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->code\",\"$this->password\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function add2(){
		$sql = "insert into cliente (image,name,lastname,email,username,password,kind,created_at) ";
		$sql .= "value (\"$this->image\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->kind,$this->created_at)";
		return Executor::doit($sql);
	}
}
?>