<?php
/**
* @author evilnapsis
* @brief Agregar un usuario
**/
		//$nac = $_POST["nac"];
		//$fecha_nac = time() - strtotime($nac);
		//$edad_nac = floor($fecha_nac / 31556926);

		$p = new ClientData();
		$continuar = true;
		if($_POST["ruc_dni"]!=""){
			if(ClientData::getByName($_POST["ruc_dni"])!=null){ $continuar=false; }

		}
		if($continuar){
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
			

#echo "$p->nombre";

		// $p->name = $_POST["name"];
		// $p->username = $_POST["username"];
		// $p->email = $_POST["email"];
		// $p->password = sha1(md5($_POST["password"]));
		// $p->kind = $_POST["kind_id"];
		// $imag="";
		// if(isset($_FILES["image"])){
		// 	$image=new Upload($_FILES["image"]);
		// 	if($image->uploaded){
		// 		$image->Process("storage/images/");
		// 		if($image->processed){
		// 			$image=$image->file_dst_name;
		// 		}
		// 	}
		// }
		// $p->image=$imag;
		$px = $p->add();
		}else{
			Core::alert("El correo electronico ya esta en uso!");
		}

		Core::redir("./?view=client");
?>