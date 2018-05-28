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

	// $server = "localhost";
	// $name_db = "id1372451_root";
	// $pass_db = "1234567890";
	// $db = "id1372451_lbadmin";

if($_GET["id"]!=$_SESSION["user_id"]){


	$conexion = new mysqli($server,$name_db,$pass_db,$db);


	$query  = "TRUNCATE person";
	$resultado = $conexion -> query($query);

	sleep(1);

	$query1  = "INSERT INTO person (id, name, lastname, dni) SELECT id, nombre, apellido, dni FROM cliente";
	$resultado1 = $conexion -> query($query1);

}else{
	Core::alert("Error!");
}

Core::redir("./?view=person");

?>


?>