<?php
include('Database.php');
$bd = $_GET['bd'];
$accion = $_GET['id'];
$sql = "DELETE FROM $bd WHERE id = $accion";
// echo $sql;
$sql = mysqli_query($con,$sql);
echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";

?>
