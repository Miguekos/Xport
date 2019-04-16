<?php

include 'Database.php';
if(isset($_SESSION["user_id"]) ){
  $name = UserData::getById($_SESSION["user_id"])->name;
  $lastname = UserData::getById($_SESSION["user_id"])->lastname;
  $user_name = $name." ".$lastname;
}
$gastosvarios = $_POST['gastosvarios'];
$totalmemcierre = $_POST['totalmemc'];
$totalventascieere = $_POST['totalventasc'];
$totalcajacierre = $_POST['totalcajac'];
$horasdelcierre = $_POST['horasdelcierre'];


$cajac = "insert into cierre (gastosvarios, totalmemc, totalventasc, totalcajac, hora, user_id) value ('$gastosvarios','$totalmemcierre','$totalventascieere','$totalcajacierre','$date','$user_name')";
// echo "$cajac";
$cajac1 = mysqli_query($con,$cajac);
//$cajac2 = mysqli_fetch_array($cajac1);
//$cajac3 = $cajac2[0];

$cierre = $_POST['cierre'];
// echo $cierre;
$num_cierres = "insert into horadecierre (cierres, horasdelcierre) value ('$cierre','$date')";
// echo $num_cierres;
$result_C = mysqli_query($con,$num_cierres);
//echo "$result_C";
//$rowC = mysqli_fetch_array($result_C);
//$conteo_C = $rowC[0];
//echo "$conteo_C";


Core::redir("./?view=cierre");
?>
