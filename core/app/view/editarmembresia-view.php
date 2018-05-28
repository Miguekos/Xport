<section class="content" style="padding-top: 0px; padding-bottom: 0px;">

<?php
$user = MemData::getById($_GET["id"]);
?>

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
            Editar Membresia
            <!-- <small><b>N° <?php echo $mem->id + 1; ?> </b></small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Editar Membresia</li>
          </ol>
        </section>

                <div class="row">
                    <div class="col-md-12">

                <form id="form3" action="./?action=actualizarmembresia" method="POST">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="panel panel-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
                        <div class="panel-heading">
                            Informacion
                        </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Nombre de la Membresia</label>
                                    <input type="text" name="nombre" value="<?php echo $user->nombre; ?>" class="form-control" placeholder="Membresia">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Precio</label>
                                    <input type="text" name="precio" value="<?php echo $user->precio; ?>" class="form-control" placeholder="Monto de la Membresia">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Tiempo de la Membresia</label>
                                    <input type="number" name="tiempo_de_la_membresia" value="<?php echo $user->tiempo_de_la_membresia; ?>" class="form-control" placeholder="Dias">
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Agregado Por:</label>
                                    <input type="text" readonly value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?>" name="agregado" required class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nota</label>
                                    <textarea name="nota" class="form-control" placeholder="Nota"><?php echo $user->nota; ?></textarea>
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