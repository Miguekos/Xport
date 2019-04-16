<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <?php
    include('hora.php');
    $alumns = ClientData::getAll();
    ?>
    <section class="content-header" style="padding-bottom: 10px;">
        <h1>
            Control
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Control</li>
        </ol>
    </section>
    <!-- Inicio del ROW separa el slide bar del conenido -->
    <div class="row">
        <div class="col-lg-12">
            <!-- <a href="./?action=gym&id=0" class="btn btn-default">Actualizar</a><br><br> -->
            <div class="box box-warning">
                <div class="box-body">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th class="text-center">Vence</th>
                                <th class="text-center">Deuda</th>
                                <!-- <th></th>
                                <th></th> -->

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_SESSION["user_id"])) {
                                $nombrecito = UserData::getById($_SESSION["user_id"])->name . " ";
                            } {
                                $apellidocito = UserData::getById($_SESSION["user_id"])->lastname;
                            }
                            foreach ($alumns as $al) {
                                $alumn = $al;
                                ?>
                                <tr>

                                    <!-- Button trigger modal -->
                                    <td class="text-center" style="width:60px;"><a class="btn btn-warning btn-xs"><?php echo $alumn->id; ?></a></td>
                                    <td data-toggle="modal" data-target="<?php echo "#" . $alumn->id; ?>"><?php echo $alumn->nombre . " " . $alumn->apellido; ?></td>

                                    <!-- Modal -->
                                    <div style="" class="modal modal-default fade in" id="<?php echo $alumn->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title text-center" id="myModalLabel"><label class="pull-left"><?php echo "Boleta " . $alumn->boleta; ?></label><b>DNI:</b> <?php echo $alumn->dni; ?></h4>
                                                </div>
                                                <!-- Cuerpo del Model -->
                                                <form id="form3" action="./?action=actiontest" method="POST">
                                                    <input type="hidden" name="dni" value="<?php echo $alumn->dni; ?>">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="background-color: ; border-radius: 10px;">
                                                                    <div class="panel-body">
                                                                        <h4>
                                                                            <p class="text-center"><b><?php echo $alumn->nombre; ?></b>
                                                                        </h4>
                                                                        </p>

                                                                        <div class="form-group col-lg-3">
                                                                            <label>Abono</label>
                                                                            <input type="text" name="abono" autofocus class="form-control" placeholder="Abono">
                                                                        </div>
                                                                        <div class="form-group col-lg-3">
                                                                            <label>Monto A Pagar</label>
                                                                            <input type="text" name="total" readonly value="<?php echo $alumn->monto; ?>" class="form-control" placeholder="Monto a pagar">
                                                                        </div>
                                                                        <div class="form-group col-lg-3">
                                                                            <label>Deuda</label>
                                                                            <input type="text" name="deuda" readonly value="<?php echo $alumn->deuda; ?>" class="form-control" placeholder="">
                                                                        </div>
                                                                        <div class="form-group col-lg-3">
                                                                            <label>Fecha Fin</label>

                                                                            <?php
                                                                            $color = 'style="background-color: ; color: ;"';
                                                                            ?>

                                                                            <input type="text" readonly name="fecha_fin" value="<?php echo $alumn->fecha_fin; ?>" class="form-control" placeholder="Apellidos" <?php echo "$color"; ?>>
                                                                        </div>

                                                                        <div class="form-group col-lg-12">
                                                                            <label>Nota</label>
                                                                            <textarea name="nota" class="form-control" placeholder="Nota"><?php echo $alumn->nota; ?></textarea>
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
                                                    <input type="hidden" name="nombre" value="<?php echo $alumn->nombre; ?>">
                                                    <input type="hidden" name="apellido" value="<?php echo $alumn->apellido; ?>">

                                                    <!-- Fin del cuerpo -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Salir</button>
                                                        <input type="hidden" name="id_cliente" value="<?= $alumn->id; ?>">

                                                        <button type="submit" value="form3" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Guardar Cambios</button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                    </div>

                    <!-- Fin del Model -->

                    <?php


                    $colorp = 'style="background-color: ; color: ;"';



                    ?>

                    <td class="text-center"><?php echo $alumn->dni; ?></td>

                    <?php
                    $item6 = $alumn->fecha_fin;
                    include('format_fecha.php');
                    ?>
                    <td class="text-center" <?php echo "$colorp"; ?>><?php echo $fecha_lista; ?></td>



                    <td class="text-center"><?php echo $alumn->deuda; ?></td>
                <?php

            }

            ?>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- /.row -->
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("#example").DataTable({
            // "ordering":true,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

    });
</script>