<?php
//Conexion a la base de datos.
include 'Database.php';
include 'hora.php';

$id = $_GET['id'];

$clienteControl = "Select * from cliente where id = " . $id . "";
$ejecutar_query_control = mysqli_query($con, $clienteControl);
$key = mysqli_fetch_array($ejecutar_query_control);
// $result_cliente_control = mysqli_fetch_array($ejecutar_query_control)
?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <section class="content-header" style="padding-bottom: 10px;">
        <a onclick="atras()" class="btn btn-danger pull-left">atras</a>
        <h1 class="text-center">
            Control de pagos <?php echo $key['nombre']; ?> <?php echo $key['apellido']; ?>
            <small></small>
        </h1>
    </section>
    <!-- Inicio del ROW separa el slide bar del conenido -->
    <div class="row">
        <div class="col-lg-12">
            <form id="form3" action="./?action=actiontest" method="POST">
                <input type="hidden" name="dni" value="<?php echo $key['dni']; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="" style="background-color: ; border-radius: 10px;">
                                <div class="panel-body">

                                    <div class="form-group col-lg-3">
                                        <label>Abono</label>
                                        <input type="text" name="abono" required autofocus class="form-control" placeholder="Abono">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Monto A Pagar</label>
                                        <input type="text" name="total" readonly value="<?php echo $key['monto']; ?>" class="form-control" placeholder="Monto a pagar">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Deuda</label>
                                        <input type="text" name="deuda" readonly value="<?php echo $key['deuda']; ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Fecha Fin</label>

                                        <?php
                                        $color = 'style="background-color: ; color: ;"';
                                        ?>

                                        <input type="text" readonly name="fecha_fin" value="<?php echo $key['fecha_fin']; ?>" class="form-control" placeholder="Apellidos" <?php echo "$color"; ?>>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Nota</label>
                                        <textarea name="nota" class="form-control" placeholder="Nota"><?php echo $key['nota']; ?></textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="hidden" value="<?php echo $nombrecito . $apellidocito ?>" name="atendido" required class="form-control" placeholder="Nombre">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="">Agregar a Caja?</label>
                                            <select class="form-control" name="id_abono">
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">Fecha del Abono</label>
                                            <input type="text" class="form-control" name="fecha_abono" value="<?php echo $date_lista; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="nombre" value="<?php echo $key['nombre']; ?>">
                <input type="hidden" name="apellido" value="<?php echo $key['apellido']; ?>">

                <!-- Fin del cuerpo -->
                <div class="text-center">
                    <input type="hidden" name="id_cliente" value="<?= $key['id']; ?>">
                    <button type="submit" value="form3" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</section>

<script>
    function close() {
        window.close();
    }

    function atras() {
        // alert("Se preciono el boton");
        window.location.href = ".?view=control";
    }
</script>