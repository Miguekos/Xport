<?php

date_default_timezone_set('America/Lima');
// $date = date("Y-m-d g:i a");
$date = date("Y-m-d H:i:s");
$server = "localhost";
// $name_db = "fitseven_miguel";
// $pass_db = "Alexkos12.";
// $db = "fitseven_ventasgym";

$name_db = "root";
$pass_db = "";
$db = "fitseven_ventasgym";


$con = new mysqli($server,$name_db,$pass_db,$db);
// print_r($con);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}else{
	// echo "Conecto";
}



?>
