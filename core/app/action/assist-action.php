<?php
// $server = "localhost";
// $name_db = "root";
// $pass_db = "";
// $db = "assistlist";

// $conexion = new mysqli($server,$name_db,$pass_db,$db);


// $query  = "TRUNCATE assistlist.person";
// $resultado = $conexion -> query($query);

// sleep(3);

// $query1  = "INSERT INTO person (id, name, lastname) SELECT id, nombre, apellido FROM gym.cliente";
// $resultado = $conexion -> query($query1);


// print "<script>window.location='index.php?view=users';</script>";

	$server = "localhost";
	$name_db = "root";
	$pass_db = "";
	$db = "lbadmin";

if($_GET["id"]!=$_SESSION["user_id"]){

$mi_id = $_GET["id"];

	$conexion = new mysqli($server,$name_db,$pass_db,$db);


$kind_id = "";
$date_at = "";
$person_id = "";
$user_id = "1";

	// $query1  = "INSERT INTO person (id, name, lastname, dni) SELECT id, nombre, apellido, dni FROM cliente";
	$query1  = "INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`) VALUES ($id,$kind_id,$date_at,$person_id,$user_id) WHERE id = 1";
	$resultado1 = $conexion -> query($query1);

}else{
	Core::alert("Error!");
}

Core::redir("./?view=person");

?>


?>