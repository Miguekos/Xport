<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <?php
    $data["posts"] = ClientData::getAll();
    ?>
    <section class="content-header" style="padding-bottom: 10px;">
        <h1>
            Clientes
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
                            <?php foreach ($data["posts"] as $post) : ?>
                                <?php
                                #$llamar = "href='editar.php?nombre=$post->id'";
                                #$borrar = "href='SQLparaBorrar.php?nombre=$post->id'";
                                $tiempo_ini = date_create("$post->fecha_inicio");
                                $tiempo = date_create("$post->fecha_fin");
                                $fecha2 = $GLOBALS['fecha'];
                                $fechahoy = date_create($fecha2);
                                $dias = date_format($tiempo, 'd');
                                $mes = date_format($tiempo, 'm');
                                $ano = date_format($tiempo, 'Y');
                                $asd = $dias - 7;
                                $asd1 = $dias;
                                $fecha_inicio = date_create("$post->fecha_inicio");
                                $fecha_fin = date_create("$post->fecha_fin");
                                $gymxd = "$post->gymxdias";
                                ?>
                                <tr>
                                    <td><?= $post->id; ?></td>
                                    <td><?= $post->nombre; ?> <?= $post->apellido; ?></td>
                                    <td class="text-center"><?= $post->dni; ?></td>
                                    <td class="text-center"><?= $post->nombre_mem; ?></td>
                                    <td class="text-center"><?php echo date_format($fecha_inicio, "d/m/Y"); ?></td>
                                    <td class="text-center"><?php echo date_format($fecha_fin, "d/m/Y"); ?></td>
                                    <td class="text-center" style="width:100px;">
                                        <a href="./?view=editclient&id=<?= $post->id; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                        <!-- <a onclick="borrar(<?= $post->id; ?>)" href="./?action=delclient&id=<?= $post->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a> -->
                                        <a onclick="borrar(<?= $post->id; ?>)" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                                    </td>

                                    <?php
                                    

                                    if ($tiempo > $fechahoy) {
                                        // echo "ENTRO AL IF";
                                        // echo $GLOBALS['fecha2'];
                                        $color = 'text-center btn btn-xs btn-success';
                                        $estadonombre = "Activo";
                                        $urlderenovacion = "norenovar()";
                                    }else {
                                        // echo "NO ENTRO AL IF";
                                        // echo $GLOBALS['fecha2'];
                                        $color = 'text-center btn btn-xs btn-danger';
                                        $estadonombre = "Vencio";
                                        $urlderenovacion = "renovar(<?= $post->id; ?>)";
                                    }
                                    // $color = 'btn-success';
                                    // if ($gymxd >= 1) {
                                    //     //echo "$fecha";
                                    //     $color = 'text-center btn btn-xs btn-primary';
                                    // } elseif ($GLOBALS['fecha2'] > $asd1 and $GLOBALS['fecha3'] >= $mes and $GLOBALS['fecha4'] >= $ano) {
                                    //     //echo "$fecha";
                                    //     $color = 'text-center btn btn-xs btn-danger';
                                    // } elseif ($GLOBALS['fecha4'] > $ano) {
                                    //     //echo "$fecha";
                                    //     $color = 'text-center btn btn-xs btn-danger';
                                    // } elseif ($GLOBALS['fecha2'] >= $asd and $GLOBALS['fecha3'] >= $mes and $GLOBALS['fecha4'] >= $ano) {
                                    //     //codigo
                                    //     $color = 'text-center btn btn-xs btn-warning';
                                    // } else {
                                    //     $color = 'text-center btn btn-xs btn-success';
                                    // }
                                    ?>
                                    <!-- <td class="text-center" style="width: 90px;"><a class="<?php echo $color; ?>">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a></td> -->
                                    <td onclick="<?php echo $urlderenovacion; ?>" class="text-center" style="width: 90px;"><a class="<?php echo $color; ?>"> <?php echo $estadonombre; ?> </a></td>
                                </tr>

                            <?php endforeach; ?>
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
        window.location.href = `./?action=renewclient&id=${id}`;
    }

    function norenovar() {
        alert("No puedes renovar debe estar vencido");
    }
</script>