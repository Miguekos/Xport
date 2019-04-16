<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
    $user = $_GET["id"];
?>
<?php
    include 'Database.php';
    $sql  = "SELECT * FROM empleados where id = $user";
    //$sql  = "SELECT * FROM membresia where id = $cid";
    $result = mysqli_query($con,$sql);
    $emple = mysqli_fetch_object($result);
?>
<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
		<section class="content-header" style="padding-bottom: 10px;">
          <h1>
            Nuevo Empleado
          </h1>
          <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>            
            <li class="active">Nuevo Empleados</li>
          </ol>
        </section>
        <div class="row">
            <div class="col-md-12">
       		<form id="form3" action="./?action=updateem" method="POST">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
						<div class="panel-heading">
                            Datos
                        </div>
							<div class="panel-body">
                                <div class="form-group col-lg-6">
									<label>Nombre Completo</label>
									<input type="text" name="nombre" value="<?php echo $emple->nombre; ?>" required class="form-control" placeholder="Nombre">
								</div>
								<div class="form-group col-lg-3">
									<label>DNI/C.E.</label>
									<input type="number" step="any" value="<?php echo $emple->dni; ?>" name="dni" class="form-control" required placeholder="DNI/C.E.">
								</div>
								<div class="form-group col-lg-3">
									<label>Telf</label>
									<input type="text" name="telf" value="<?php echo $emple->telf; ?>" required class="form-control" placeholder="Telf">
								</div>
								<div class="form-group col-lg-3">
									<label>Cargo</label>
									<input type="text" name="cargo" value="<?php echo $emple->cargo; ?>" class="form-control" required placeholder="Cargo">
								</div>
								<div class="form-group col-lg-3">
									<label>Sueldo</label>
									<input type="number" step="any" value="<?php echo $emple->sueldo; ?>" name="sueldo" class="form-control" placeholder="Sueldo">
								</div>
                                <div class="form-group col-lg-3">
									<label>Adelantos</label>
									<input type="number" step="any" value="<?php echo $emple->adelantos; ?>" name="adelantos" required class="form-control" placeholder="adelantos">
                                </div>  
								<div class="form-group col-lg-3">
									<label>Nota</label>
									<textarea name="nota" class="form-control" placeholder="Nota"><?php echo $emple->nota; ?></textarea>
								</div>
								<div class="form-group col-lg-12 text-center">
									<input type="hidden" name="id" value="<?=$emple->id;?>">
									<button type="submit" onclick="guardar()" class="btn btn-block btn-warning">Actualizar</button>
								</div>
					</div>
				</div>
				<div id="snackbar">Guardado..</div>
			</form>
                </div>
                <div class="col-lg-3">
         	</div>
        </div>
                <!-- /.row -->
</section>