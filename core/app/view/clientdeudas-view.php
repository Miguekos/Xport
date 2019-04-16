<?php
//Conexion a la base de datos.
include 'Database.php';
include 'hora.php';

$date_actual = date("Y-m-d");
// echo $date_actual;
$clientedueda = "SELECT * FROM cliente WHERE fecha_fin < '$date_actual'";
$queryclientedueda = mysqli_query($con, $clientedueda);

?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <section class="content-header" style="padding-bottom: 10px;">
        <h1>
            Clientes con deudas o vencidos
            <a href="./?view=newclient" class="btn btn-success">Agregar</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./?view=newclient"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Clientes</li>
        </ol>
    </section>
    <!-- Inicio del ROW separa el slide bar del conenido -->
    <div class="row">
        <div class="col-lg-12">

            <div class="box box-warning">
                <div class="box-body">
                    <table class="table datatable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th class="text-center" style="width: 10%;">DNI</th>
                                <th class="text-center" style="width: 30%;">Membresia</th>
                                <th class="text-center" style="width: 10%;">Inicio</th>
                                <th class="text-center" style="width: 10%;">Expira</th>
                                <th class="text-center">Accion</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($key = mysqli_fetch_array($queryclientedueda)) {
                                # code...
                                //  echo $key['nombre'];
                                ?>
                                <?php
                                $tiempo_ini = date_create($key['fecha_inicio']);
                                $tiempo = date_create($key['fecha_fin']);
                                $fecha2 = $GLOBALS['fecha'];
                                $fechahoy = date_create($fecha2);
                                $fecha_inicio = date_create($key['fecha_inicio']);
                                $fecha_fin = date_create($key['fecha_fin']);
                                ?>
                                <tr>
                                    <td><?= $key['id']; ?></td>
                                    <td><?= $key['nombre']; ?> <?= $key['apellido']; ?></td>
                                    <td class="text-center"><?= $key['dni']; ?></td>
                                    <td class="text-center"><?= $key['nombre_mem']; ?></td>
                                    <td class="text-center"><?php echo date_format($fecha_inicio, "d/m/Y"); ?></td>
                                    <td class="text-center"><?php echo date_format($fecha_fin, "d/m/Y"); ?></td>
                                    <td class="text-center" style="width:100px;">
                                        <a href="./?view=editclient&id=<?= $key['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                        <!-- <a onclick="borrar(<?= $key['id']; ?>)" href="./?action=delclient&id=<?= $key['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a> -->
                                        <a onclick="borrar(<?= $key['id']; ?>)" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                                    </td>

                                    <?php


                                    if ($tiempo > $fechahoy) {
                                        // echo "ENTRO AL IF";
                                        // echo $GLOBALS['fecha2'];
                                        $color = 'text-center btn btn-xs btn-success';
                                        $estadonombre = "Activo";
                                        $urlderenovacion = "norenovar()";
                                    } else {
                                        // echo "NO ENTRO AL IF";
                                        // echo $GLOBALS['fecha2'];
                                        $color = 'text-center btn btn-xs btn-danger';
                                        $estadonombre = "Renovar";
                                        $urlderenovacion = 'renovar(id)';
                                    }
                                    ?>
                                    <!-- <td class="text-center" style="width: 90px;"><a class="<?php echo $color; ?>">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a></td> -->
                                    <td onclick="renovar(<?php echo $key['id'] ?>)" class="text-center" style="width: 90px;"><a class="<?php echo $color; ?>"> <?php echo $estadonombre; ?> </a></td>
                                </tr>

                            <?php
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

<script>
    function borrar(id) {
        console.log(id);
        var respuesta = confirm("Estas seguro que quieres elminar..??");
        if (respuesta) {
            // window.location.href = "./?action=delclient&id=" . id;
            window.location.href = `./?action=delclient&id=${id}`;
        }
    }

    function renovar(id) {
        window.location.href = `./?view=renewclient&id=${id}`;
    }

    function norenovar() {
        alert("No puedes renovar debe estar vencido");
    }
</script>