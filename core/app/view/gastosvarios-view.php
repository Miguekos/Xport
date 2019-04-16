<?php
//Conexion a la base de datos.
include 'Database.php';

$gastos = "Select * from gastos";
$gastos_control = mysqli_query($con,$gastos);

?>


<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
$data["posts"]=ClientData::getAll();
?>
    <section class="content-header" style="padding-bottom: 10px;">
      <h1>
        Gastos Varios
      </h1>
    </section>
    <!-- Inicio del ROW separa el slide bar del conenido -->
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
            		<form action="./?action=insertargastos" id="insertarCaja" method="POST" accept-charset="utf-8">
            				<div class="form-group col-lg-4">

            				</div>
            				<!-- accion -->
            				<div class="row col-sm-12 text-center">
            				<div class="form-group col-sm-4">
            					<!-- Izquierda -->
            				</div>

            					<div class="form-group text-center col-sm-4">
            						<label>Accion</label>

            						<select autofocus class="form-control text-center" required name="accion">
            							<option value="0">-- SELECIONE ACCION --</option>
            							<option value="deposito">Deposito</option>
            							<option value="retiro">Retiro</option>
            						</select>
            					</div>

            				<div class="form-group col-sm-4">
            					<!-- Derecha -->
            				</div>
            				</div>

            				<br>
            				<br>

            				<!-- Monto -->
            				<div class="row col-sm-12 text-center">
            					<div class="form-group col-sm-4">
            						<!-- Izquierda -->
            					</div>

            					<div class="form-group col-sm-4">
            						<label>Monto</label>
            						<input type="number" required class="form-control" name="gastos">
            					</div>

            					<div class="form-group col-sm-4">
            						<!-- Derecha -->
            					</div>
            				</div>

            				<!-- Motivo -->
            				<div class="row col-sm-12 text-center">
            					<label>Motivo</label>
            				</div>
            				<div class="row col-sm-12 text-center">
            					<div class="form-group col-sm-3 text-center">
            						<!-- Izquierda -->
            					</div>

            					<div class="form-group col-sm-6 text-center	">

            						<textarea class="form-control" required rows="4" cols="50" name="motivo"></textarea>

            					</div>

            					<div class="form-group col-sm-3">
            						<!-- Derecha -->
            					</div>
            				</div>


            				<div class="text-center form-group col-lg-12">
            					<input type="submit" class="btn sombra btn-info" value="Guardar">
            				</div>
            		</form>

            		<div class="row col-sm-12">

                    <table class="table datatable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                            	<th class="text-center">#</th>
                                <th class="text-center">Catidad</th>
                                <th class="text-center">Accion</th>
                                <th class="text-center">Motivo</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                    <?php
            	       while ($rowX = mysqli_fetch_array($gastos_control)) {

                            $item6 = $rowX['hora'];
                            include('format_fecha.php');

                            echo "<tr>";
                            echo "<td class='text-center'>".$rowX['id']."</td>";
                            echo "<td class='text-center'>".$rowX['gastos']."</td>";
                            echo "<td class='text-center'>".$rowX['accion']."</td>";
                            echo "<td class='text-center'>".$rowX['motivo']."</td>";
                            echo "<td class='text-center'>".$fecha_lista."</td>";
                            echo "<td class='text-center'><a class='btn btn-sm btn-danger' onclick='return Confirmation()' href='./?action=eliminar2&bd=".'gastos'."&id=".$rowX['id']."'>Eliminar</a></td>";
                            echo "</tr>";
                    }
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
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
