<?php

		$p = ClientData::getById($_POST["id"]);
			$p->membresia_c = $_POST["membresia_c"];
			$p->nombre_mem = $_POST["nombre_mem"];
			$p->tiempo_mem = $_POST["tiempo_mem"];
			//$p->precio_mem = $_POST["precio_mem"];
			$p->fecha_inicio = $_POST["fecha_inicio"];
			$p->fecha_fin = $_POST["fecha_fin"];
			$p->fecha_alert = $_POST["fecha_alert"];
			$p->dni = $_POST["ruc_dni"];
			$p->telf = $_POST["telf"];
			$p->nombre = $_POST["razon_social"];
			$p->domicilio = $_POST["direccion"];
			$p->pago = $_POST["pago"];
			$p->monto = $_POST["monto"];
			$p->deuda = $_POST["deuda"];
			$p->forma_pago = $_POST["forma_pago"];
			$p->contrato = $_POST["contrato"];
			$p->boleta = $_POST["boleta"];
			$p->nota = $_POST["nota"];
			$p->atendido = $_POST["atendido"];
		
		$p->update();

		// $server = "localhost";
		// $name_db = "root";
		// $pass_db = "";
		// $db = "lbadmin";

		// $conexion = new mysqli($server,$name_db,$pass_db,$db);


		// $query  = "TRUNCATE person";
		// $resultado = $conexion -> query($query);

		// $query1  = "INSERT INTO person (id, name, lastname, dni, deuda, c2_note) SELECT id, nombre, apellido, dni, deuda, nota FROM cliente";
		// $resultado1 = $conexion -> query($query1);
		// $prueba = $_POST["monto"];
		// echo "$prueba";
		// sleep(3)


		#print_r($p)
		#echo "$p->nombre";

		// if(isset($_FILES["image"])){
		// 	$image=new Upload($_FILES["image"]);
		// 	if($image->uploaded){
		// 		$image->Process("storage/images/");
		// 		if($image->processed){
		// 			$p = UserData::getById($_POST["id"]);
		// 			$p->image=$image->file_dst_name;
		// 			$p->update_img();
		// 		}
		// 	}
		// }

		
		// if($_POST["password"]!=""){
		// $p = UserData::getById($_POST["id"]);
		// $p->password= sha1(md5($_POST["password"]));
		// $p->update_passwd();

		// }



		#Core::redir("./?view=editclient&id=".$_POST["id"]);
		Core::redir("./?view=client");
?>