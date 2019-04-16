<?php
    //CConexion a la base de datos.
    // $fecha_i = $_POST['fecha1'];
    // echo "$fecha_i"."<br>";
    // $fecha_f = $_POST['fecha2'];
    //echo "$fecha_f"."<br>";
    include 'Database.php';
    mysqli_select_db($con,"ajax_demo");

    $filtrarD = "Select sum(total) from ventas";
    // echo "$filtrarD";
    $filtrarD1 = mysqli_query($con,$filtrarD);
    $filtrarD2 = mysqli_fetch_array($filtrarD1);
    $filtrarD3 = $filtrarD2[0];
    // echo $filtrarD3;

    $filtrar1D = "Select * from ventas order by idV desc limit 500";
    
    // echo "$filtrar1D";
    $filtrar1D1 = mysqli_query($con,$filtrar1D);
    // $filtrar1D2 = mysqli_fetch_array($filtrar1D1);
    // $filtrar1D3 = $filtrar1D2[0];
    // echo $filtrarD3;
?>
<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<section class="content-header" style="padding-bottom: 10px;">
  <h1>
    Facturas
  </h1>
</section>
<!-- Inicio del ROW separa el slide bar del conenido -->
<div class="row">
    <div class="col-lg-12">

        <div class="box box-warning">
            <div class="box-body">
            <table class="table datatable table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th class="text-center">N. Factura</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio Unidad</th>
                <th class="text-center">Precio Total S/.</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Vendido Por:</th>
                <th class="text-center">Accion</th>
            </tr>
            </thead>
            <tbody>
        <?php
            while($row = mysqli_fetch_array($filtrar1D1)) {
                $item6 = $row[9];
                include('format_fecha.php');

                echo "<tr>";
                echo "<td class='text-center'>".$row[1]."</td>";
                echo "<td class='text-center'>".$row[3]."</td>";
                echo "<td class='text-center'>".$row[4]."</td>";
                echo "<td class='text-center'>".$row[5]."</td>";
                echo "<td class='text-center'>".$row[6]." S/.</td>";
                echo "<td class='text-center'>".$row[7]." S/.</td>";
                echo "<td class='text-center'>".$fecha_lista."</td>";
                echo "<td class='text-center'>".$row[10]."</td>";
                echo "<td class='text-center'><a class='btn btn-sm btn-danger' onclick='return Confirmation()' href='./?action=eliminar3&bd=".'ventas'."&id=".$row[0]."'>Eliminar</a></td>";
                echo "</tr>";
            }
        ?>
            </tbody>
        </table>
      </div>
  </div>
</div>
</div>
<!-- /.row -->
</section>

<script type="text/javascript">
function Confirmation() {

  if (confirm('Esta seguro de eliminar el registro?')==true) {
      // alert('El registro ha sido eliminado correctamente!!!');
      return true;
  }else{
      //alert('Cancelo la eliminacion');
      return false;
  }
}
</script>
