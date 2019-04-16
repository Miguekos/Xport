<?php
class Database {
	public static $db;
	public static $con;
	function __construct(){
		// $this->user="fitseven_miguel";$this->pass="Alexkos12.";$this->host="localhost";$this->ddbb="fitseven_ventasgym";
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="fitseven_ventasgym";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
