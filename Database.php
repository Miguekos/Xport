<?php
$server = "localhost";
$name_db = "root";
$pass_db = "";
$db = "xport";

$con = new mysqli($server,$name_db,$pass_db,$db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}else{
	//echo "Conecto";
}


// $name_db = "fitseven_miguel";
// $pass_db = "Alexkos12.";
// $db = "fitseven_lbadmin";
?>
