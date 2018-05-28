<!DOCTYPE html>
<html>
    <head>
        <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
        </style>
    </head>
    <body>

    <?php
    $q = intval($_GET['q']);
    

    $con = mysqli_connect('localhost','root','','xport');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM membresia WHERE id = '".$q."'";
    $result = mysqli_query($con,$sql);
    date_default_timezone_set('America/Lima');

    
    echo "<table class='table datatable table-bordered table-hover table-striped'>
    <tr>
    <th>Nombre</th>
    <th>Dias</th>
    <th>Precio</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td> <input type='text' readonly id='nombre_mem' name='nombre_mem' class='form-control' value='" . $row['nombre'] . "' ></td>";
        echo "<td> <input type='text' readonly id='tiempo_mem' name='tiempo_mem' class='form-control' value='" . $row['tiempo_de_la_membresia'] . "' ></td>";
        echo "<td> <input type='text' readonly id='monto' name='monto' class='form-control' value='" . $row['precio'] . "' ></td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM membresia WHERE id = '".$q."'";
    $result = mysqli_query($con,$sql);
    $filas = mysqli_fetch_array($result);
    //$dias_mem = "+".$filas['tiempo_de_la_membresia']." days";
   
    //$fechaSum = date("Y-m-d");
    //$nuevafecha = strtotime ( '+30 day' , strtotime ( $fechaSum ) ) ;
    //$nuevafecha1 = strtotime ( "+".$filas['tiempo_de_la_membresia']." days" , strtotime ( $fechaSum ) ) ;
    //$nuevafecha = date ( 'Y-m-d' , $nuevafecha1 );
    //echo $nuevafecha1;

    $fecha_actual = date("Y-m-d");
    //sumo 1 día
    $dias_mem = "+ ". $filas['tiempo_de_la_membresia'] ." days";
    //echo "DIASSSS" . $dias_mem;
    $fecha_fin = date("Y-m-d",strtotime($fecha_actual."$dias_mem")); 
    //resto 1 día
    $fecha_alert = date("Y-m-d",strtotime($fecha_fin."- 15 days")); 

    echo "

    <label>Fecha de Inicio</label>
    <input type='date' id='fecha_inicio' name='fecha_inicio' class='form-control' value='" . $fecha_actual . "' >
    <label>Fecha de Fin</label>
    <input type='date' id='fecha_fin' name='fecha_fin' class='form-control' value='" . $fecha_fin . "' >
    <label>Fecha de Alerta</label>
    <input type='date' id='fecha_alert' name='fecha_alert' class='form-control' value='" . $fecha_fin . "' >


    ";
    
    
    mysqli_close($con);
    ?>

    </body>

<script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "ordering":true,
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>