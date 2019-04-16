<?php

$server = "localhost";
$name_db = "fitseven_miguel";
$pass_db = "Alexkos12.";
$db = "fitseven_gymsport";

$conexion = new mysqli($server,$name_db,$pass_db,$db);
// Array with names
$a[] = "Anna";


// get the q parameter from URL
$q = $_REQUEST["q"];


if ($q == "a") {
        
    //Identificar el ID maximo actual
    $query3  = "SELECT count(*) FROM inventiolite.product";
    $max_id_product = mysqli_query($conexion, $query3);
    $con = mysqli_fetch_row($max_id_product);
    $max_product = $con[0];
    echo "$max_product";

    };

if ($q == "b") {
    
    //Identificar el ID maximo actual
    $query3  = "SELECT count(*) FROM inventiolite.product";
    $max_id_product = mysqli_query($conexion, $query3);
    $con = mysqli_fetch_row($max_id_product);
    $max_product = $con[0];
    echo "$max_product";

    };


$hint = "";

?>