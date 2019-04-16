<?php

include ('Database.php');

			$id_cliente = $_POST["id_cliente"];
			$id_abono = $_POST["id_abono"];
			$nombre = $_POST["nombre"];
			$dni = $_POST["dni"];
			$fecha_fin = $_POST["fecha_fin"];
			$abono = $_POST["abono"];
			$total = $_POST["total"];
			$nota = $_POST["nota"];
			$fecha_abono = $_POST["fecha_abono"];


			$deuda1 = $_POST["deuda"];

			// $monto = $_POST["monto"];

			$deuda = $deuda1 - $abono;


			//echo $deuda;


			$sql = "INSERT INTO abonos (id_cliente, id_abono, nombre, dni, fecha_fin, abono, total, deuda, nota, fecha_abono) VALUES ('$id_cliente','$id_abono', '$nombre', '$dni', '$fecha_fin', '$abono', '$total', '$deuda', '$nota', '$fecha_abono')";
    	//echo $sql;
			//echo "<br>";
			$abonar = mysqli_query($con,$sql);
			$deuda_c = "update cliente set deuda = $deuda where id = $id_cliente";
			$deuda_c = mysqli_query($con,$deuda_c);
			//echo $deuda_c;


			Core::redir("./?view=abono");
?>
