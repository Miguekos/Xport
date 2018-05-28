<section class="content">
<?php
$data["posts"]=ClientData::getAll();
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contacto  </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Escritorio
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Contacto
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                    <a href="./?view=newclient" class="btn btn-default">Agregar</a><br><br>
                        <div class="box box-warning">
                            <div class="box-body table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                    <table id="example1" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre y Apellido</th>
                                                <th>DNI</th>
                                                <th>Telf</th>
                                                <!-- <th>Expiracion</th> -->
                                                <!-- <th class="text-center">Accion</th> -->
                                                <!-- <th>Estado</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data["posts"] as $post):?>
                            <?php
                                            #$llamar = "href='editar.php?nombre=$post->id'";
                                            #$borrar = "href='SQLparaBorrar.php?nombre=$post->id'";
                                            $tiempo_ini = date_create("$post->fecha_inicio");
                                            $tiempo = date_create("$post->fecha_fin");
                                            $dias = date_format($tiempo, 'd');
                                            $mes = date_format($tiempo, 'm');
                                            $ano = date_format($tiempo, 'Y');
                                            $asd = $dias - 7;
                                            $fecha_inicio = date_create("$post->fecha_inicio");
                                            $fecha_fin = date_create("$post->fecha_fin");
                            ?>
                                            <tr>
                                                <td><?=$post->id;?></td>
                                                <td><?=$post->nombre;?> <?=$post->apellido;?></td>
                                                <td><?=$post->dni;?></td>
                                                <td><?=$post->telf;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                </section>