<?php
include('Database.php');
$bd = $_GET['bd'];
$accion = $_GET['id'];
// echo $accion;
$sql = "DELETE FROM $bd WHERE idC = $accion";
// echo $sql;
$sql = mysqli_query($con,$sql);
echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";

?>
