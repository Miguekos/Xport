<?php
class Database {
	public static $db;
	public static $con;
	function __construct(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="xport";
		// $this->user="id1372451_root";$this->pass="1234567890";$this->host="localhost";$this->ddbb="id1372451_lbadmin";
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
