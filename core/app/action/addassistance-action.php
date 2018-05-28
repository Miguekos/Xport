<!DOCTYPE html>
<html>
<head>
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
}
.emp{
margin-bottom: 0px; 
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
background-color: #60a917; 
color: white; 
border-radius: 5px;
padding-top: 80px;
padding-bottom: 90px;
}
.vencio{
margin-bottom: 0px; 
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
background-color: #f0ad4e; 
color: white; 
border-radius: 5px;
padding-top: 2%;
padding-bottom: 2%;
font-size: 130%;

}
.borro{
margin-bottom: 0px; 
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
background-color: #d9534f; 
color: white; 
border-radius: 5px;
padding-top: 2%;
padding-bottom: 2%;
font-size: 130%;
}
.paso{
margin-bottom: 0px; 
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
background-color: #337ab7; 
color: white; 
border-radius: 5px;
padding-top: 100px;
padding-bottom: 100px;

}

</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
//echo "$q";

include 'Database.php';

// $con = mysqli_connect('localhost','root','','lbadmin');

mysqli_select_db($con,"sd");
$sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
$result = mysqli_query($con,$sql);

// while($row = mysqli_fetch_array($result)) {
    
//     echo "<td>" . $row['id'] . "</td>";
//     echo "<td>" . $row['nombre'] . "</td>";
//     echo "<td>" . $row['apellido'] . "</td>";
//     echo "<td>" . $row['edad'] . "</td>";
//     echo "<td>" . $row['telf'] . "</td>";
    
// }

//Asistencia
    //Se conecta a la base de datos y busca poor ID o DNI y el resultado lo guarda en un arreglo
    mysqli_select_db($con,"");
    $sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $fee = $GLOBALS['fcs'];
    $kind = 1;
    $user_id = $_SESSION["user_id"];
    $idd = $row['id'];
    $notaP = $row['nota'];
    $fecha_estandar = date("Y-m-d");
    //echo  $notaP;
    //echo $fecha_em1;
    //echo $fee;
    //echo  $row['nombre'];
    //echo "$idd";
    //$fecha_esp = $GLOBALS['fcs'];
    //echo $fecha_esp;
    if ($row['gymxdias'] >= 1) {
        
    }else{
        if ($GLOBALS['fecha'] > $row['fecha_fin']) {
            // echo "<b data-toggle='modal' data-target='#$idd' class='vencio'>Vencio</b>";
        }else{
            
        }
    }
    if ($idd !== null) {
        
        $sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
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
            mysqli_select_db($con,"");
            $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`) VALUES ('1','$fee','$idd','$user_id','0')";
            $result1 = mysqli_query($con,$sql1);



            $date14 = date_create("$ffin");
            $diaU = date_format($date14, 'd');
            $mesU = date_format($date14, 'm');
            $anoU = date_format($date14, 'Y');
            //$fecha1 = $ffin;
            $fecha2 = $GLOBALS['fecha'];

            //echo $ffin - $GLOBALS['fecha'];
            
            //echo $diaU."<br>";
            //echo $GLOBALS['fecha2']."<br>";
            
            //Resta 7 dias al fecha actual
            $diaS = $diaU - 7;
            //echo $diaS;
            
            if($diaS < 0)
            {
                $mesS = $mesU - 1;
                //echo $mesS;
                if($ffin < $GLOBALS['fecha']){
                    $color = "borro"; 
                }
                elseif($mesS <= $GLOBALS['fecha3'] and $anoU == $GLOBALS['fecha4']){
                    $color = "vencio"; 
                }else{
                    $color = "asistio"; 
                }
                    
            }else{
                //Evalua si ya la fecha paso o no (vencio)
                if($ffin < $GLOBALS['fecha']){
                    $color = "borro"; 
                //Evalua si su fecha final -7 es menos o igual el dia actual.            
                }elseif($diaS <= $GLOBALS['fecha2'] and $mesU >= $GLOBALS['fecha3'] and $anoU == $GLOBALS['fecha4']){
                    $color = "vencio"; 
                }else{
                    $color = "asistio";
                }
            }
                //Suma la cantidad de asistencia
                $sql2="SELECT SUM(kind_id) FROM assistance WHERE person_id = '".$idd."'";
                $result2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_row($result2);

                //Calcula la de dias cliente temporal
                $sql3="SELECT gymxdias FROM `cliente` WHERE id = '$idd'";
                $result3 = mysqli_query($con,$sql3);
                $row3 = mysqli_fetch_row($result3);
                // echo $row3['0'];

                if ($row3['0'] == null) {
                    echo "<div class='row'>";
                    echo "<div class='col-lg-4'>";
                    // echo "<img class='img-rounded' src='dist/img/$idd.jpg' alt='Avatar' width='260' height='260'>";
                    // echo "<img class='img-rounded' src='dist/img/$idd.jpg' alt='Avatar' width='260' height='260'>";
                    echo "</div>";
                    echo "<div class='col-lg-8'>";
                    echo "<div data-toggle='modal' data-target='#$idd' class='"."$color"."'><b>"."";
                    echo ""."$namee"."</b>";
                    echo "Registro: <b>"."$fee"."</b>";
                    echo "<br></b>Asistencia: <b>".$row2['0']."</b> dias.<br>";
                    echo "Deuda: <b>"."$deudaa"." </b>S/.<br>";
                    echo "Finaliza en: <b>"."$ffinf"."</b><br>";
                    echo "Nota: <b>"."$notaP"."</b>";
                    echo "</div>";
                    echo "";
                }elseif ($row2['0'] === $row3['0']) {
                    echo "<b class='paso'>Ultima Visita</b>";
                    echo "<div data-toggle='modal' data-target='#$idd' class='paso'><b>"."$namee";
                    echo "<br></b> Tiene <b>".$row2['0']." de ".$row3['0']."</b> Asistecnia. <br>";
                    echo "Asistio..!</div>";
                }else{
                    echo "<div data-toggle='modal' data-target='#$idd' class='paso'><b>"."$namee";
                    echo "<br></b> Tiene <b>".$row2['0']." de ".$row3['0']."</b> Asistecnia. <br>";
                    echo "Asistio..!</div>";
                }
        }else{

            if($q > 999999999 and $q < $GLOBALS['max_id_e'] + 1){      
            $sql="SELECT * FROM `empleados` WHERE id = '".$q."' or dni = '".$q."'";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result)) {
                $namee = "<h1>".$row['nombre']."</h1>";
                //echo $namee;
                //echo "aqui";
                $idde = $row['id'];
                //$deudaa = $row['deuda'];
                //$ffin = $row['fecha_fin'];
                //echo date("Y-m-d",$ffin);
                //echo $ffin;
                //$date12 = date_create("$ffin");
                //$ffinf = date_format($date12, 'd-m-Y');
    
                }
                //Aqui se inserta la asistencia.
                mysqli_select_db($con,"");
                $sql1="INSERT INTO `assistance`(`kind_id`, `date_at`, `person_id`, `user_id`, `total_asis`) VALUES ('1','$fee','$idde','$user_id','0')";
                $result1 = mysqli_query($con,$sql1);
                echo "<div data-toggle='modal' data-target='#$idde' class='emp'><b>".""."$namee"."</b>";
                echo "Registro: <b>"."$fee"."</b><br>";
                echo "Nota: <b>"."$notaP"."</b>";
                echo "</div>";
            }else{
                echo "No existe";
            }
        
        }
    


mysqli_close($con);
?>

</body>
</html>