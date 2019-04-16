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
        padding-top: 80px;
        padding-bottom: 90px;
        }
    .emp{
        margin-bottom: 0px; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        background-color: #60a917; 
        color: white; 
        border-radius: 5px;
        padding-top: 100px;
        padding-bottom: 100px;
        }
    .vencio{
        margin-bottom: 16px; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        background-color: #f0ad4e; 
        color: white; 
        border-radius: 5px;
        padding-right: 20px;
        padding-left: 20px;
        }
    .borro{
        margin-bottom: 0px; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        background-color: #d9534f; 
        color: white; 
        border-radius: 5px;
        padding-top: 100px;
        padding-bottom: 100px;
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
$q = $_GET['q'];
//echo "$q";


// $con = mysqli_connect('localhost','root','','lbadmin');
include 'Database.php';

// mysqli_select_db($con,"");
// $sql="SELECT * FROM `cliente` WHERE id = '".$q."' or dni = '".$q."'";
// $result = mysqli_query($con,$sql);

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
    $sql="SELECT * FROM `cliente` WHERE dni = '".$q."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $fee = $GLOBALS['fcs'];
    $kind = 1;
    $user_id = $_SESSION["user_id"];
    $idd = $row['id'];
    $notaP = $row['nota'];

    if ($idd !== null) {
        
        $sql="SELECT * FROM `cliente` WHERE dni = '".$q."'";
        
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            $namee = $row['nombre'];
            $iddr = $row['id'];

            echo " <a class='btn btn-primary' href='#'>$namee</a><br>";
            echo "<br>";

            echo "<table class='w3-table-all text-center'>";
            
            
            echo "<tr class='w3-green'>";

            // echo "<th>Nombre</th>";
            // echo "</tr>";
            // echo "<tr>";
            // echo "<td>$namee</td>";
            // echo "</tr>";
            //echo "";
			//$namee = $row['nombre'];
            //$deudaa = $row['deuda'];
            //$ffin = $row['fecha_fin'];
            //echo date("Y-m-d",$ffin);
            //echo $ffin;
             echo "<th>Mostrando los Ultimos 15 dias de asistencia..!!</th>";
			
		//$sql="SELECT * FROM `assistance` WHERE `person_id` = '".$q."'";
        $sql="SELECT * FROM (SELECT * FROM `assistance` WHERE `person_id` = '".$iddr."' ORDER BY ID DESC LIMIT 15) sub ORDER BY `ID` DESC";
        // echo $sql;
        // $sql="SELECT * FROM (SELECT * FROM `assistance` WHERE `person_id` = '".$q."' ORDER BY ID DESC) sub ORDER BY ID DESC";
        //print_r($sql);
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)) {
			//$namee = "<h1>".$row['nombre']."</h1>";
			$asiss = $row['date_at'];
			//echo $asiss."<br>";

            
             echo "</tr>";

            //echo "<tr>";
            //echo "<td></td>";
            //echo "</tr>";
            //echo "<tr>";
            //echo "<td></td>";
             echo "<td>$asiss</td>";
            // echo "</tr>";
			//$deudaa = $row['deuda'];
			//$ffin = $row['fecha_fin'];
			//echo date("Y-m-d",$ffin);
			//echo $ffin;
			}
            
            echo "</table>";
            echo "</div>";
		}
	}else{
        echo "No se encuentra el registro";
    }

mysqli_close($con);
?>



</body>
</html>