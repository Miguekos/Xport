<?php

		$p = ClientData::getById($_POST["id"]);
		$p->nombre = $_POST["nombre"];
		$p->apellido = $_POST["apellido"];
		$p->fecha_inicio = $_POST["fecha_inicio"];
		$p->fecha_fin = $_POST["fecha_fin"];
        $p->nota = $_POST["nota"];
		$p->atendido = $_POST["atendido"];        
        //Monto a pagar
            $p->monto = $_POST["monto"];
        
        $abono = $_POST["abono"];
        //echo $abono;
        $p->pago = $_POST["pago"]+$abono;
        $p->deuda = $p->monto-$p->pago;

		$p->update_control();

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
		Core::redir("./?view=control");
?>