<?php

		$p = EmpleadosData::getById($_POST["id"]);
		$p->nombre = $_POST["nombre"];
		$p->dni = $_POST["dni"];
		$p->telf = $_POST["telf"];
		$p->cargo = $_POST["cargo"];
		$p->sueldo = $_POST["sueldo"];
		$p->adelantos = $_POST["adelantos"];
		$p->nota = $_POST["nota"];
		
		$p->update();

		Core::redir("./?view=empleados");
?>