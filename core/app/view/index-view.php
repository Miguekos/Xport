<?php
if(isset($_SESSION["user_id"])):
	$user = UserData::getById($_SESSION["user_id"]);
date_default_timezone_set('America/Lima');
//Un arreglo para convertir la fecha en espa#ol
$dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
$meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 

//Imprimier fecha en espa#ol
$fcs = $dias_S[date('w')]." ".date('j').", ".$meses_S[date('n')-1]. "  ".date('Y'). ", " .date('g:i a');
$fcs1 = $dias_S[date('w')]." ".date('j');
$fechaS = $dias_S[date('w')];

//Distintos Formatos de fecha
$fecha = date("Y-m-d");
$fecha1 = date("d-m-Y");
$fecha2 = date("d");
$fecha3 = date("m");
$fecha4 = date("Y");
$fecha6 = date("Y-M-D");

include 'Database.php';

$conexion = new mysqli($server,$name_db,$pass_db,$db);

//Suma pagos
// $query  = "SELECT SUM(pago) as total_suma FROM cliente";
// $result = mysqli_query($conexion, $query);
// $suma = mysqli_fetch_row($result);
// $totalsum = $suma[0];

//Facturado
// $query3  = "SELECT SUM(monto) as total_suma FROM cliente";
// $result_fac = mysqli_query($conexion, $query3);
// $fac = mysqli_fetch_row($result_fac);
// $totalfac = $fac[0];
// $totaldeu = ($totalsum - $totalfac);

//Total de CLientes
$query1  = "SELECT count(*) FROM cliente";
$result_cli = mysqli_query($conexion, $query1);
$cli = mysqli_fetch_row($result_cli);
$totalcli = $cli[0];

//Total de User
// $query2  = "SELECT count(*) FROM user";
// $result_usr = mysqli_query($conexion, $query2);
// $usr = mysqli_fetch_row($result_usr);
// $totalusr = $usr[0];

//---Inicio de grafica de asistencia
// $query3  = "SELECT count(valor) FROM grafica";
// $asiste = mysqli_query($conexion, $query3);
// $asis = mysqli_fetch_row($asiste);
// $t_asis = $asis[0];


//Comprueba si existe alguna asistencia del dia actual
$query5  = "SELECT * FROM grafica WHERE tiempo = '$fecha'";
$total_b = mysqli_query($conexion, $query5);
$asd = mysqli_fetch_row($total_b);
$zxc = $asd[0];

//Declaracion de variable para usar de forma mas comoda el LIKE en mysql
$fechaM = $fcs1."%";

//Si no existe asistencia actual crea una
if ($zxc===null) {
    $query4  = "SELECT COUNT(*) FROM assistance WHERE date_at LIKE '$fechaM'";
    $total_a = mysqli_query($conexion, $query4);
    $asd = mysqli_fetch_row($total_a);
    $qwe = $asd[0];

    $query5  = "INSERT INTO `grafica`(valor, tiempo, dia) VALUES ('$qwe','$fecha','$fechaS')";
    $resultado1 = $conexion -> query($query5);

//Si ya existe actualiza la que esta
}else{

    $query4  = "SELECT COUNT(*) FROM assistance WHERE date_at LIKE '$fechaM' and kind_id = 1";
    $total_a = mysqli_query($conexion, $query4);
    $asd = mysqli_fetch_row($total_a);
    $qwe = $asd[0];

    $query6  = "UPDATE `grafica` SET `valor`='$qwe' WHERE tiempo = '$fecha'";
    $total_c = mysqli_query($conexion, $query6);

}
//---FIN de grafica de asistencia


//Inicio --- Pintar la Grafica

//Ordena e imprmime los ultimos 15 dias por nombr
$query7 = "SELECT dia FROM (SELECT `ID`, `dia` FROM grafica ORDER BY ID DESC LIMIT 15) sub ORDER BY `ID` ASC";
$diaaa = mysqli_query($conexion, $query7);

//Ordena e imprmime los ultimos 15 dias por Cantidad de asistencias
$sql3 = "SELECT valor FROM (SELECT `ID`, `valor` FROM grafica ORDER BY ID DESC LIMIT 15) sub ORDER BY `ID` ASC";
$total_f = mysqli_query($conexion, $sql3);

//Leer todos los ID de las personas
// $query8  = "SELECT person_id FROM `assistance`";
// $array_assis = mysqli_query($conexion, $query8);

//Contar la cantidad de asistencia segun el id de la persona
//  while ($fila = mysqli_fetch_row($array_assis)) {
//      $query9  = "SELECT count(*) FROM `assistance` WHERE person_id = $fila[0]";
//      $countasis = mysqli_query($conexion, $query9);
//      $c_asis = mysqli_fetch_row($countasis);
//      $c_asis_t = $c_asis[0];
//      }


// $conexion = new mysqli($server,$name_db,$pass_db,$db);
// $sql10 = "SELECT count(*) FROM `cliente` WHERE DAY(fecha_fin) > 5 AND MONTH(fecha_fin) = DATE_FORMAT(NOW(),'%m') AND YEAR(fecha_fin) = DATE_FORMAT(NOW(),'%Y') ORDER BY `cliente`.`fecha_fin` ASC";
// $resultado10 = mysqli_query($conexion, $sql10);
// $registros10 = mysqli_fetch_row($resultado10);
// $deudores = $registros10['0'];

$sql_max_deu = "SELECT count(*) FROM cliente WHERE deuda > 0";
$resultado_max_deu = mysqli_query($conexion, $sql_max_deu);
$registros_max_deu = mysqli_fetch_row($resultado_max_deu);
$max_deu = $registros_max_deu[0];

$sql_max_ven = "SELECT count(*) FROM `cliente` WHERE DAY(fecha_fin) > 5 AND MONTH(fecha_fin) = DATE_FORMAT(NOW(),'%m') AND YEAR(fecha_fin) = DATE_FORMAT(NOW(),'%Y') ORDER BY `cliente`.`fecha_fin` ASC";
$resultado_max_ven = mysqli_query($conexion, $sql_max_ven);
$registros_max_ven = mysqli_fetch_row($resultado_max_ven);
$max_ven = $registros_max_ven[0];

?>
<!--         <script>
			function showHint(str) {
					if (str.length == 0) { 
							document.getElementById("txtHint").innerHTML = "";
							return;
					} else {
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() {
									if (this.readyState == 4 && this.status == 200) {
											document.getElementById("txtHint").innerHTML = this.responseText;
									}
							};
							xmlhttp.open("GET", "Variable.php?q=" + str, true);
							xmlhttp.send();
					}
			}
		</script> -->
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-warning">
    <section class="content">

      <div id="container"></div>  
      <br>
             <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalcli; ?></div>

                                    <div>Clientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="clientes.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-smile-o fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Clientes Temporales</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dollar fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><small><?php echo $max_ven; ?></small></div>
                                    <div>Clientes Por Vencer</div>
                                </div>
                            </div>
                        </div>
                        <a href="PorVencer.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-usd fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $max_deu; ?></div>
                                    <div>Clientes Con Deudas</div>
                                </div>
                            </div>
                        </div>
                        <a href="deudores.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
 

    <?php endif;?>
    <?php if(Core::$user->kind!=1):?>
    <h3 class="text-center">No eres Administrados</h3>
    <?php endif;?>
     

<script type="text/javascript">

Highcharts.chart('container', {

    title: {
        text: 'Estadistica de Asistencia'
    },

    subtitle: {
        text: 'Xsport GYM'
    },

    xAxis: {
        categories: [
		
		<?php	
				
				
		while ($fila = mysqli_fetch_row($diaaa)) {	
			$dias = $fila[0];
			echo "'".$dias."',";
			}
					
		?>
		
		
					]
    },

    yAxis: {
        title: {
            text: 'Numero de Clientes'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },


series: [
    {
        name: 'Asistencia',
        data: [<?php 

        $asd = $total_f; 
        while ($fila = mysqli_fetch_row($asd)) {
        	echo $fila[0].",";
        }

	       	 ?>], color:'orange'
   },
   ]

});
    
</script>
</div>
</div>
</section>
