<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
		<section class="content-header" style="padding-bottom: 10px;">
          <h1>
            Nuevo Empleados
            <small><b>N° <?php echo $GLOBALS['max_id_e'] + 1 ?></b></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>            
            <li class="active">Nuevo Empleados</li>
          </ol>
        </section>
        <div class="row">
            <div class="col-md-12">
       		<form id="form3" action="./?action=addem" method="POST">
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-danger" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid red 1px; border-radius: 5px;">
						<div class="panel-heading">
                            Datos Personales
                        </div>
							<div class="panel-body">
							  <img class="img-rounded" src="dist/img/avatar5.png" alt="Avatar" style="width:100%">
							  <br>
							  <br>
								<input type="file" class="pull-left btn btn-default col-lg-12" value="Cargar" name="">
							  <br>
							  <br>
								
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="panel panel-danger" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid red 1px; border-radius: 5px;">
						<div class="panel-heading">
                            Datos Tecnicos
                        </div>
							<div class="panel-body">
                                
                                <div class="form-group col-lg-6">
									<label>Nombre</label>
									<input type="text" name="nombre" required class="form-control" placeholder="Nombre">
								</div>
								<div class="form-group col-lg-6">
									<label>Apellidos</label>
									<input type="text" name="apellido" required class="form-control" placeholder="Apellidos">				
                                </div>                               
								<div class="form-group col-lg-6">
									<label>DNI/C.E.</label>
									<input type="text" name="dni" class="form-control" required placeholder="DNI/C.E.">
								</div>
								<div class="form-group col-lg-6">
                                    <label>Fecha Inicio*</label>
                                        <input type="date" name="fecha_inicio" class="form-control" placeholder="aaaa-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> 
                                </div>
								<div class="form-group col-lg-6">
									<label>Cargo</label>
									<input type="text" name="cargo" class="form-control" required placeholder="Cargo">
								</div>
								<div class="form-group col-lg-6">
									<label>Edad</label>
									<input type="text" name="edad" class="form-control" placeholder="Edad">
								</div>
								<div class="form-group col-lg-6">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control">
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                                </div>
								<div class="form-group col-lg-6">
									<label>Nota</label>
									<textarea name="nota"  class="form-control" placeholder="Nota"></textarea>
								</div>
								<div class="form-group col-lg-12 text-center">
								
									<button type="submit" onclick="guardar()" class="btn btn-block btn-danger">Agregar</button>
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