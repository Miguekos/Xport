<!DOCTYPE html>
<html>
<head>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <meta http-equiv="Refresh" content="5;url=/agregarasistencia.php">

    <!-- <meta id="meta-refresh" http-equiv="refresh" content="30; URL=(your url)"> -->
<style>
.asistio{
margin-bottom: 0px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: #5cb85c;
color: white;
border-radius: 5px;
padding-top: 5%;
padding-bottom: 5%;
font-size: 130%;
text-align: justify;
padding-left: 10%;
}
.emp{
margin-bottom: 0px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: #60a917;
color: white;
border-radius: 5px;
padding-top: 80px;
padding-bottom: 90px;
text-align: justify;
padding-left: 10%;
}
.vencio{
margin-bottom: 0px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: #f0ad4e;
color: white;
border-radius: 5px;
padding-top: 5%;
padding-bottom: 5%;
font-size: 130%;
text-align: justify;
padding-left: 10%;
}
.borro{
margin-bottom: 0px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: #d9534f;
color: white;
border-radius: 5px;
padding-top: 5%;
padding-bottom: 5%;
font-size: 130%;
text-align: justify;
padding-left: 10%;
}
.paso{
margin-bottom: 0px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
background-color: #337ab7;
color: white;
border-radius: 5px;
padding-top: 100px;
padding-bottom: 100px;
text-align: justify;
padding-left: 10%;

}

</style>
</head>
<body>

<?php
$q = $_GET['q'];

include 'Database.php';

mysqli_select_db($con,"sd");
// $sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
// $sql="SELECT * FROM `cliente` WHERE dni = '".$q."'";
// $result = mysqli_query($con,$sql);

//Asistencia
    //Se conecta a la base de datos y busca poor ID o DNI y el resultado lo guarda en un arreglo
    mysqli_select_db($con,"");
    // $sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
    $sql="SELECT * FROM `cliente` WHERE dni = '".$q."' order by id DESC";
    // echo $sql;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $fee = $GLOBALS['fcs'];
    $kind = 1;
    $user_id = $_SESSION["user_id"];
    $idd = $row['id'];
    $notaP = $row['nota'];
    $fecha_estandar = date("Y-m-d");

    if ($idd !== null) {
        // $sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
        $sql="SELECT * FROM `cliente` WHERE dni = '".$q."' order by id DESC";
        //print_r($sql);
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            $namee = "<h1>".$row['nombre']."</h1>";
            //$namee = $row['nombre'];
            $deudaa = $row['deuda'];
            $ffin = $row['fecha_fin'];
            //echo date("Y-m-d",$ffin);
            //echo $ffin;
            $date12 = date_create("$ffin");
            $ffinf = date_format($date12, 'd-m-Y');
            }
            //Aqui se inserta la asistencia.
            //mysqli_select_db($con,"");
//            $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`,`create_at`) VALUES ('1','$fee','$idd','$user_id','0','$date')";
            //$sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`) VALUES ('1','$fee','$idd','$user_id','0')";
//            $result1 = mysqli_query($con,$sql1);

            $date14 = date_create("$ffin");
            $diaU = date_format($date14, 'd');
            $mesU = date_format($date14, 'm');
            $anoU = date_format($date14, 'Y');
            //$fecha1 = $ffin;
            $fecha2 = $GLOBALS['fecha'];

            //echo $ffin - $GLOBALS['fecha'];
            //echo $diaU."<br>";
            //echo $GLOBALS['fecha2']."<br>";


                //Suma la cantidad de asistencia
            $sql2="SELECT SUM(kind_id) FROM assistance WHERE person_id = '".$idd."'";
            $result2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_row($result2);

            // fecha del cliente
            $datetime1 = date_create($ffin);
            //$datetime1 = date_create('2019-04-12');
            //$datetime1 = date_create($fecha2);
            // fecha de hoy
            $datetime2 = date_create($fecha2);

            //echo $fecha2;
            //echo "<br>";
            //$interval = date_diff($datetime1, $datetime2);
            //echo $interval->format('%R%a días');
            //echo "$interval";
            //if ($int_diff == "5") {
            //    echo "Es igual a 5";
            //};

            if ($deudaa == 0) {
                if ($datetime1 > $datetime2) {
                    $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`,`create_at`,`deuda`,`vencimiento`) VALUES ('1','$fee','$idd','$user_id','0','$date',0,0)";
                    $result1 = mysqli_query($con,$sql1);
                    $color = "asistio";
                    $sonido = "";
                }else {
                    $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`,`create_at`,`deuda`,`vencimiento`) VALUES ('1','$fee','$idd','$user_id','0','$date',0,1)";
                    $result1 = mysqli_query($con,$sql1);
                    $color = "borro";
                    $sonido = "<embed src='/custom/alert.mp3' autostart='true' loop='true' volume='80' width='0' height='0'>";
                };
              // echo "<iframe src='prueba.php' width='300' height='300'>aqui esta</iframe>";
            }else {
                if ($datetime1 > $datetime2) {
                    $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`,`create_at`,`deuda`,`vencimiento`) VALUES ('1','$fee','$idd','$user_id','0','$date',1,0)";
                    $result1 = mysqli_query($con,$sql1);
                    $color = "borro";
                    $sonido = "<embed src='/custom/alert.mp3' autostart='true' loop='true' volume='80' width='0' height='0'>";
                }else {
                    $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`,`create_at`,`deuda`,`vencimiento`) VALUES ('1','$fee','$idd','$user_id','0','$date',1,1)";
                    $result1 = mysqli_query($con,$sql1);
                    $color = "borro";
                    $sonido = "<embed src='/custom/alert.mp3' autostart='true' loop='true' volume='80' width='0' height='0'>";
                };
            }

            echo $sonido;
            echo "<div class='row'>";
            echo "<div class='col-lg-3'>";
            echo "</div>";
            echo "<div class='col-lg-6'>";
            echo "<div data-toggle='modal' data-target='#$idd' class='"."$color"."'><b>"."";
            echo ""."$namee"."</b>";
            echo "<u>Registro:</u> <b>"." $fee"."</b>";
            echo "<br></b><u>Asistencia:</u> <b> ". $row2['0']."</b><br>";
            echo "<u>Deuda:</u> <b>"."$deudaa "." </b>S/.<br>";
            echo "<u>Finaliza en:</u> <b> "." $ffinf"."</b><br>";
            echo "<u>Nota:</u> <b> "." $notaP"."</b>";
            echo "</div>";
            echo "<div class='col-lg-3'>";
            echo "</div>";
            echo "";
        }else {
          echo "
          <div class='col-sm-3'>
          </div>
          <div class='col-sm-6 alert alert-warning'>
            <strong>Alerta! </strong> Usted no esta en la base de datos.
          </div>
          <div class='col-sm-3'>
          </div>
          ";
        }



mysqli_close($con);
?>

</body>
</html>
