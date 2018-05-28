<section class="content" style="padding-top: 0px; padding-bottom: 0px;">

<?php

include 'Database.php';

//Identificar el ID maximo actual

$sql  = "SELECT * FROM membresia";
$result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
// $mem = mysqli_fetch_object($membresia);



    // echo $row['id'];



        }

?>

<section class="content-header" style="padding-bottom: 10px;">
          <h1>
            Nueva Membresia
            <!-- <small><b>N° <?php echo $mem->id + 1; ?> </b></small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Nueva Membresia</li>
          </ol>
        </section>

                <div class="row">
                    <div class="col-md-12">

                <form id="form3" action="./?action=agregarmembresia" method="POST">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="panel panel-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
                        <div class="panel-heading">
                            Informacion
                        </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Nombre de la Membresia</label>
                                    <input type="text" name="nombre" class="form-control" required placeholder="Membresia">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Precio</label>
                                    <input type="text" name="precio" class="form-control" required placeholder="Monto de la Membresia">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Tiempo de la Membresia</label>
                                    <input type="number" name="tiempo_de_la_membresia" required class="form-control" placeholder="Dias">
                                </div>
                                
                                <!-- <div class="form-group col-lg-6">
                                    <label>Fecha fin</label>
                                    <input type="date" name="membresia" class="form-control" placeholder="Membresia">
                                </div> -->
                                <!-- <div class="form-group col-lg-6">
                                    <label>Fecha Inicio*</label>
                                        <input type="date" name="fecha_inicio" class="form-control" placeholder="aaaa-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> 
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Forma de pago*</label>
                                    <select name="forma_pago" class="form-control">
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta de Cedrito">Tarjeta de Cedrito</option>
                                        <option value="Tarjeta de Debido">Tarjeta de Debido</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Contrato N°:</label>
                                    <input type="text" name="contrato" required class="form-control" placeholder="Numero de Contrato">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Boleta N°:</label>
                                    <input type="text" name="boleta" required class="form-control" placeholder="Numero de Boleta">
                                </div> -->
                                
                                <div class="form-group col-lg-6">
                                    <label>Agregado Por:</label>
                                    <input type="text" readonly value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?>" name="agregado" required class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nota</label>
                                    <textarea name="nota"  class="form-control" placeholder="Nota"></textarea>
                                </div>
                                <div class="form-group col-lg-12 text-center">
                                    <input type="hidden" name="id" value="<?=$user->id;?>">
                                    <button type="submit" onclick="guardar()" class="btn btn-block btn-warning">Agregar</button>
                                </div>
                    </div>
                </div>
                <div id="snackbar">Guardado..N° <?php echo $GLOBALS['max_id'] + 1 ?></div>
            </form>

                    </div>
                    <div class="col-lg-3">


                    </div>
                </div>
                <!-- /.row -->

</section>