<?php
//Conexion a la base de datos.
include 'Database.php';
include 'hora.php';

$clienteControl = "Select * from cliente";
$ejecutar_query_control = mysqli_query($con, $clienteControl);
// $result_cliente_control = mysqli_fetch_array($ejecutar_query_control)

?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
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
                            while ($key = mysqli_fetch_array($ejecutar_query_control)) {
                                ?>
                                <tr>
                                    <!-- Button trigger modal -->
                                    <td class="text-center" style="width:60px;"><a onclick="ejecutarcontrol(<?php echo $key['id'] ?>)" class="btn btn-warning btn-xs"><?php echo $key['id']; ?></a></td>
                                    <td onclick="ejecutarcontrol(<?php echo $key['id'] ?>)"><?php echo $key['nombre'] . " " . $key['apellido']; ?></td>
                                    <!-- Modal -->
                    </div>
                    <!-- Fin del Model -->
                    <?php
                    $colorp = 'style="background-color: ; color: ;"';
                    ?>
                    <td class="text-center"><?php echo $key['dni']; ?></td>
                    <?php
                    $item6 = $key['fecha_fin'];
                    include('format_fecha.php');
                    ?>
                    <td class="text-center" <?php echo "$colorp"; ?>><?php echo $fecha_lista; ?></td>
                    <td class="text-center"><?php echo $key['deuda']; ?></td>
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
<script>
    function ejecutarcontrol(id) {
        console.log(id);
        // window.location.href = ".?view=controlnuevo&id=1";
        window.open(`.?view=controlnuevo&id=${id}`, '_blank');

    }
</script>
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