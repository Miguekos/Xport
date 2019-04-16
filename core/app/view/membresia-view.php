<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
$data["posts"]=MemData::getAll();
?>

                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Promociones
                    <a href="./?view=newmembresia" class="btn btn-success">Agregar</a>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <!-- <li><a href="#">Examples</a></li> -->
                    <li class="active">Promociones</li>
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
                                                <th style="width: 5%;">ID</th>
                                                <th>Nombres </th>
                                                <th style="width: 20%;">Precio</th>
                                                <th>Tiempo (Dias)</th>
                                                <th class="text-center">Agregado Por</th>
                                                <th class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data["posts"] as $post):?>
                                    <?php
                                            #$llamar = "href='editar.php?nombre=$post->id'";
                                            #$borrar = "href='SQLparaBorrar.php?nombre=$post->id'";
                                            // $tiempo_ini = date_create("$post->fecha_inicio");
                                            // $tiempo = date_create("$post->fecha_fin");
                                            // $dias = date_format($tiempo, 'd');
                                            // $mes = date_format($tiempo, 'm');
                                            // $ano = date_format($tiempo, 'Y');
                                            // $asd = $dias - 7;
                                            // $asd1 = $dias;
                                            // $fecha_inicio = date_create("$post->fecha_inicio");
                                            // $fecha_fin = date_create("$post->fecha_fin");
                                            // $gymxd = "$post->gymxdias";
                                    ?>
                                            <tr>
                                                <td><?=$post->id;?></td>
                                                <td><?=$post->nombre;?></td>
                                                <td><?=$post->precio . " S/";?></td>
                                                <td><?=$post->tiempo_de_la_membresia . " Dias";?></td>
                                                <td class="text-center"><?=$post->agregado;?></td>
                                                <td class="text-center" style="width:100px;">
                                                <a href="./?view=editarmembresia&id=<?=$post->id;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                <!-- <a href="./?action=delclient&id=<?=$post->id;?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a> -->
                                                </td>

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