<?php

$num_cierres = "Select id from horadecierre order by id desc limit 1";
$result_C = mysqli_query($con,$num_cierres);
$rowC = mysqli_fetch_array($result_C);
$conteo_C = $rowC[0];

$ultimahora = "Select horasdelcierre from horadecierre order by horasdelcierre desc limit 1";
$uhc = mysqli_query($con,$ultimahora);
$uhc1 = mysqli_fetch_array($uhc);
$uhc2 = $uhc1[0];
// echo "Ultimahoradel cierre ".$uhc2;

$TotalCajaMem = "Select id from cliente WHERE id_abono = '1'";
$totalcMem = mysqli_query($con,$TotalCajaMem);
$rowTCMem = mysqli_fetch_array($totalcMem);
$total_caja_mem = $rowTCMem[0];

$TotalCajaMem = "Select sum(abono) from abonos WHERE id_abono = 1 and fecha_abono > '$uhc2'";
$totalcMem = mysqli_query($con,$TotalCajaMem);
$rowTCMem = mysqli_fetch_array($totalcMem);
$total_caja_mem = $rowTCMem[0];
//echo $total_caja_mem;

$cajachicasuma = "Select sum(gastos) from gastos where accion = 'deposito' and hora > '$uhc2'";
$cajasuma = mysqli_query($con,$cajachicasuma);
$cajasuma = mysqli_fetch_array($cajasuma);
$tcajasuma = $cajasuma[0];

$cajachicaresta = "Select sum(gastos) from gastos where accion = 'retiro' and hora > '$uhc2'";
$cajaresta = mysqli_query($con,$cajachicaresta);
$cajaresta = mysqli_fetch_array($cajaresta);
$tcajaresta = $cajaresta[0];
$tcajarestacierre = $cajaresta[0] * -1;
//caja chica
$tcaja = $tcajasuma - $tcajaresta;

$TotalCaja = "Select sum(total) from ventas WHERE hora > '$uhc2'";
$totalc = mysqli_query($con,$TotalCaja);
$rowTC = mysqli_fetch_array($totalc);
//Suma de Ventas + Membresias
$total_caja = $rowTC[0] + $total_caja_mem + $tcaja;
$fecha2 = $GLOBALS['fecha'];
//Deudas

$deudores = "SELECT count(*) FROM assistance where deuda = '1' and create_at LIKE '%$fecha2%'";
$total_deudores = mysqli_query($con,$deudores);
$result_deudores = mysqli_fetch_array($total_deudores);
$total_deudores = $result_deudores[0];

//Vencidos
$vencidos = "SELECT count(*) FROM assistance where vencimiento = '1' and create_at LIKE '%$fecha2%'";
$total_vencidos = mysqli_query($con,$vencidos);
$result_vencidos = mysqli_fetch_array($total_vencidos);
$total_vencidos = $result_vencidos[0];

 ?>
