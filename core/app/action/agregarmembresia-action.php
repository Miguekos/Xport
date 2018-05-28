<?php
/**
* @author evilnapsis
* @brief Agregar un usuario
**/
		//$nac = $_POST["nac"];
		//$fecha_nac = time() - strtotime($nac);
		//$edad_nac = floor($fecha_nac / 31556926);

		$p = new MemData();
		$continuar = true;
		

		
		if($continuar){
			$p->nombre = $_POST["nombre"];
			$p->precio = $_POST["precio"];
			$p->tiempo_de_la_membresia = $_POST["tiempo_de_la_membresia"];
			// $p->email = $_POST["email"];
			// $p->telf = $_POST["telf"];
			// $p->dni = $_POST["dni"];
			//$p->edad = $edad_nac;
			// $p->sexo = $_POST["sexo"];
			// $p->edad = $_POST["edad"];
			// $p->boleta = $_POST["boleta"];
			// $p->membresia = $_POST["membresia"];
			// $p->fecha_inicio = $_POST["fecha_inicio"];
			// $p->fecha_fin = $_POST["fecha_fin"];
			// $p->gymxdias = $_POST["gymxdias"];
			// $p->monto = $_POST["monto"];
			// $p->pago = $_POST["pago"];
			// $p->deuda = $_POST["deuda"];
			// $p->forma_pago = $_POST["forma_pago"];
			$p->nota = $_POST["nota"];
			$p->agregado = $_POST["agregado"];
			// $p->contrato = $_POST["contrato"];

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
		//print_r($px);
		}

		Core::redir("./?view=membresia");
?>