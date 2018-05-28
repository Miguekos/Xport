<?php 
date_default_timezone_set('America/Lima');
$dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
$meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
$fcs = $dias_S[date('w')]." ".date('j').", ".$meses_S[date('n')-1]. "  ".date('Y'). ", " .date('g:i a');
$fcs1 = $dias_S[date('w')]." ".date('j');
$fechaS = $dias_S[date('w')];
$fecha = date("Y-m-d");
$fecha1 = date("d-m-Y");
$fecha2 = date("d");
$fecha3 = date("m");
$fecha4 = date("Y");
$fecha6 = date("Y-M-D");


// $fecha = date('Y-m-j');

//Para Sumar dias a un formato de fecha
// $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
// $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
// echo $nuevafecha;

// $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
// $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
// echo $nuevafecha;

// echo "$fecha1";
//$fecha5 = date("D");

//--Fechas en español
//$fechaS = dias_S[date('W')];
//echo $fechaS;
#echo $fecha6;

#echo "$fecha1";
#echo "$fechaa";
?>
<!-- <?php
//$date=date_create("2013-03-15");
// echo date_format($date,"d/m/Y H:i:s");
?> -->

<?php

include 'Database.php';

//Identificar el ID maximo actual

$query3  = "SELECT MAX(id) FROM cliente";
$reseult_max_id = mysqli_query($con, $query3);
$u_id = mysqli_fetch_row($reseult_max_id);
$max_id = $u_id[0];

// $query4  = "SELECT MAX(id) FROM empleados";
// $reseult_max_id = mysqli_query($con, $query4);
// $u_id_e = mysqli_fetch_row($reseult_max_id);
// $max_id_e = $u_id_e[0];


// $sql_max_deu = "SELECT count(*) FROM cliente WHERE deuda > 0";
// $resultado_max_deu = mysqli_query($con, $sql_max_deu);
// $registros_max_deu = mysqli_fetch_row($resultado_max_deu);
// $max_deu = $registros_max_deu[0];

// $sql_max_ven = "SELECT count(*) FROM `cliente` WHERE DAY(fecha_fin) > 5 AND MONTH(fecha_fin) = DATE_FORMAT(NOW(),'%m') AND YEAR(fecha_fin) = DATE_FORMAT(NOW(),'%Y') ORDER BY `cliente`.`fecha_fin` ASC";
// $resultado_max_ven = mysqli_query($con, $sql_max_ven);
// $registros_max_ven = mysqli_fetch_row($resultado_max_ven);
// $max_ven = $registros_max_ven[0];
?>