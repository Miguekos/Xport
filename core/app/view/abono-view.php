<?php
    //CConexion a la base de datos.
    // $fecha_i = $_POST['fecha1'];
    // echo "$fecha_i"."<br>";
    // $fecha_f = $_POST['fecha2'];
    //echo "$fecha_f"."<br>";
    include 'Database.php';
    mysqli_select_db($con,"ajax_demo");

    $filtrarD = "Select sum(abono) from abonos";
    // echo "$filtrarD";
    $filtrarD1 = mysqli_query($con,$filtrarD);
    $filtrarD2 = mysqli_fetch_array($filtrarD1);
    $filtrarD3 = $filtrarD2[0];
    // echo $filtrarD3;

    $filtrar1D = "Select * from abonos";
    // echo "$filtrar1D";
    $filtrar1D1 = mysqli_query($con,$filtrar1D);
    // $filtrar1D2 = mysqli_fetch_array($filtrar1D1);
    // $filtrar1D3 = $filtrar1D2[0];
    // echo $filtrarD3;
?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
$data["posts"]=ClientData::getAll();
?>
                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Abonos
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
                <th class="text-center">#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">DNI</th>
                <th class="text-center">Fecha Venci.</th>
                <th class="text-center">Abono</th>
                <th class="text-center">Deuda</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Accion</th>
            </tr>
            </thead>
            <tbody>
        <?php
            while($row = mysqli_fetch_object($filtrar1D1)) {
                $item6 = $row->fecha_abono;
                include('format_fecha.php');
                // $abono_total = $row->total - $row->abono;
                echo "<tr>";
                echo "<td class='text-center'>".$row->id."</td>";
                echo "<td class='text-center'>".$row->nombre."</td>";
                echo "<td class='text-center'>".$row->dni."</td>";
                echo "<td class='text-center'>".$row->fecha_fin."</td>";
                echo "<td class='text-center'>".$row->abono."</td>";
                echo "<td class='text-center'>".$row->deuda."</td>";
                echo "<td class='text-center'>".$fecha_lista."</td>";
                echo "<td class='text-center'><a class='btn btn-sm btn-danger' onclick='return Confirmation()' href='./?action=eliminar2&bd=".'abonos'."&id=".$row->id."'>Eliminar</a></td>";
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
