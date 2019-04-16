<?php
$dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
$meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$date = date_create("$item6");
$diaL1 = date_format($date,"w");
$diaN1 = date_format($date,"j");
$mes1 = date_format($date,"n")-1;
$ano1 = date_format($date,"Y");
$hora = date_format($date,"g:i a");
$dia1 = $dias_S["$diaL1"];
$dia2 = $diaN1;
$mes =  $meses_S["$mes1"];
$ano =  $ano1;
$hora = $hora;
$fecha_lista = $dia1." ".$dia2.", ".$mes." ".$ano.", ".$hora;
?>
