<?php
//Conexion a la base de datos.
include('Database.php');
include('totales.php');

?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
$data["posts"]=ClientData::getAll();
?>
<section class="content-header" style="padding-bottom: 10px;">
  <h1>
    Contabilidad
  </h1>
</section>
<!-- Inicio del ROW separa el slide bar del conenido -->
<div class="row">
    <div class="col-lg-12">

        <div class="box box-warning">
            <div class="box-body">
			<form action="./?action=guardarcierre" method="POST" accept-charset="utf-8">
				<div class="container">
					<input type="hidden" name="cierre" value="<?php echo $conteo_C + 1; ?>">

          <div class="form-group col-lg-2">
						<label>Otros Gastos</label>
						<input type="text" class="form-control" readonly value="<?php echo number_format($tcajarestacierre, 2, ',', '.') ." S/"; ?>" name="gastosvarios">
					</div>
					<div class="form-group col-lg-2">
						<label>Total Membresias</label>
						<input type="text" class="form-control" readonly value="<?php echo number_format($total_caja_mem, 2, ',', '.') ." S/"; ?>" name="totalmemc">
					</div>
					<div class="form-group col-lg-2">
						<label>Total en Ventas</label>
						<input type="text" class="form-control" readonly value="<?php echo number_format($rowTC[0], 2, ',', '.') ." S/"; ?>" name="totalventasc">
					</div>
					<div class="form-group col-lg-2">
						<label>Total en Caja</label>
						<input type="text" class="form-control" readonly value="<?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?>" name="totalcajac">
					</div>
          <div class="form-group col-lg-2">
						<label>Fecha del Cierre</label>
						<!-- <input type="date" class="form-control" value="today" readonly name="horasdelcierre"> -->
            <input type="text" class="form-control" readonly name="horasdelcierre" value="<?php echo $date;?>">
					</div>
					<div class="form-group col-lg-2">
					</div>
				</div>
				<div class="text-center form-group col-lg-12">
					<input type="submit" class="btn sombra btn-info" value="Cerrar Caja N: <?php echo $conteo_C + 1; ?>">
				</div>
			</form>
			<?php

			$num_facturas = "Select id from cierre order by id desc limit 1";
			$result_N_F = mysqli_query($con,$num_facturas);
			$row = mysqli_fetch_array($result_N_F);
			$conteo_f = $row[0];
			//echo "conteo: ".$conteo_f;
			?>


				<!-- <h2 class="text-center">Historial</h2> -->
					<table class="table datatable table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th data-field="" class="text-center">id</th>
							<th data-field="" class="text-center">Otros Gastos</th>
							<th data-field="" class="text-center">Total en Membresias</th>
							<th data-field="" class="text-center">Total en Ventas</th>
							<th data-field="" class="text-center">Total en caja</th>
							<th data-field="" class="text-center">Fecha</th>
						</tr>
					</thead>
					<tbody>

			<?php

			$x = 1;
			while ($conteo_f >= $x) {

				//Obtengo las facturas que tengan el mismo id de factura
				$ventas = "Select * from cierre where id = ".$x."";
				$ventas_1 = mysqli_query($con,$ventas);
				$row = mysqli_fetch_array($ventas_1);
				//Sumo todos los resultados de los productos por id de factura para obtener el total de la factura
				//$sum_facturas = "Select sum(total) from ventas where id_factura = $x";
				//$result_S_F = mysqli_query($con,$sum_facturas);
				//$rowS = mysqli_fetch_array($result_S_F);
				$item1 = $row[0];
				$item2 = $row[1];
				$item3 = $row[2];
				$item4 = $row[3];
				$item5 = $row[4];
				$item6 = $row[5];
				// $item7 = $row[6];

        include('format_fecha.php');
				// $fecha = date_format($date,"$dias_S['n']");

				//$num3 = $rowS[0];
				//$num4 = number_format($num3, 2, '.', '') ." S/";
				echo "<tr>";
					echo "<td class='text-center'>".$item1."</td>";
					echo "<td class='text-center'>".$item2."</td>";
					echo "<td class='text-center'>".$item3."</td>";
					echo "<td class='text-center'>".$item4."</td>";
					echo "<td class='text-center'>".$item5."</td>";
					echo "<td class='text-center'>".$fecha_lista."</td>";
				// 	echo "<td class='text-center'>".$item7."</td>";
          // echo "<td class='text-center'>".$item6."</td>";

					echo "</tr>";
				// echo "<div class='text-center'>".$num1." ".$num2."</div>";
				// echo "<div class='text-center'>".$num2."</div><br>";
				$x = $x + 1;
			}
			?>
					</tbody>
				</table>
			<!-- </div> -->

	</div>
</div>
</div>
</div>
<!-- /.row -->
</section>
