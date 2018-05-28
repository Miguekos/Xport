<?php

		$p = MemData::getById($_POST["id"]);

			$p->nombre = $_POST["nombre"];
			$p->precio = $_POST["precio"];
			$p->tiempo_de_la_membresia = $_POST["tiempo_de_la_membresia"];
			$p->nota = $_POST["nota"];
			$p->agregado = $_POST["agregado"];
			$nombre = $_POST["nombre"];
			$precio = $_POST["precio"];
			$tiempo_de_la_membresia = $_POST["tiempo_de_la_membresia"];
			$nota = $_POST["nota"];
			$agregado = $_POST["agregado"];
			
		$p->update();


		Core::redir("./?view=membresia");
?>