<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
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
                        <div class="box box-danger">
                            <div class="box-body">
                                    <table class="table datatable table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Nombre</th>
                                                <th class="text-center">Vence</th>
                                                <th class="text-center">Deuda</th>
                                                <!-- <th></th>
                                                <th></th> -->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($alumns as $al){
                                            $alumn = $al;
                                          ?>
                                        <tr>
                                            
                                            <!-- Button trigger modal -->
                                            <td class="text-center" style="width:60px;"><a class="btn btn-warning btn-xs"><?php echo $alumn->id; ?></a></td>
                                            <td data-toggle="modal" data-target="<?php echo "#".$alumn->id; ?>"><?php echo $alumn->nombre." ".$alumn->apellido; ?></td>                   
                                                    
                                                    <!-- Modal -->
                                                    <div style="" class="modal fade" id="<?php echo $alumn->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title text-center" id="myModalLabel"><label class="pull-left"><?php echo "Boleta ".$alumn->boleta; ?></label><b>ID:</b> <?php echo $alumn->id; ?></h4>
                                                                </div>
                                                                <!-- Cuerpo del Model -->
    

                                                                <form id="form3" action="./?action=actiontest" method="POST">        
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <div class="" style="background-color: ; border-radius: 10px;">
                                                                            <div class="panel-body">
                                                                              <img class="img-rounded" src="dist/img/avatar5.png" alt="Avatar" style="width:100%">
                                                                              <br>
                                                                              <h4><p class="text-center"><b><?php echo $alumn->nombre; ?></b></h4></p>
                                                                              
                                                                              <h5><p class="text-center"> Debes Cancelar: <b><?php echo $alumn->deuda; ?></b></h5></p>

                                                                                <div class="form-group">
                                                                                    <label>Abono</label>
                                                                                    <input type="text" name="abono" value="0" class="form-control" placeholder="Abono">
                                                                                    <br>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Actualizado Por: <?php echo $alumn->atendido; ?> </label>
                                                                                    <input type="hidden" value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?>" name="atendido" required class="form-control" placeholder="Nombre">
                                                                                </div>
                                                                                
                                                                            </div>  
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <div class="" style="background-color: ; border-radius: 10px;">
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="nombre" value="<?php echo $alumn->nombre; ?>">
                                                                                    <input type="hidden" name="apellido" value="<?php echo $alumn->apellido; ?>">
                                                                                </div>
                                                                                
                                                                                <div class="form-group">
                                                                                    <label>Fecha de Inicio</label>
                                                                                    <input type="text" name="fecha_inicio" value="<?php echo $alumn->fecha_inicio; ?>" class="form-control" placeholder="Fecha de Inicio">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Fecha Fin</label>

                                                                                    <?php
                                                                                    $gymxdi = $alumn->gymxdias;
                                                                                    $tiempo_ini = date_create("$alumn->fecha_inicio");
                                                                                    $tiempo = date_create("$alumn->fecha_fin");
                                                                                    $dias = date_format($tiempo, 'd');
                                                                                    $mes = date_format($tiempo, 'm');
                                                                                    $ano = date_format($tiempo, 'Y');
                                                                                    $semanaAn = $dias - 7;
                                                                                    $semanaAc = $dias;
                                                                                    $fecha_inicio = date_create("$alumn->fecha_inicio");
                                                                                    $fecha_fin = date_create("$alumn->fecha_fin");
                                                                                    $gymxd = "$alumn->gymxdias";                                                     

                                                                                    if ($gymxdi >= 1) {
                                                                                        //Azul
                                                                                        $color = 'style="background-color: #337ab7; color: white;"';
                                                                                    }
                                                                                    elseif ($GLOBALS['fecha2'] > $semanaAc and $GLOBALS['fecha3'] >= $mes and $GLOBALS['fecha4'] >= $ano) {
                                                                                        //Rojo
                                                                                        $color = 'style="background-color: #dd4b39; color: white;"';
                                                                                    }
                                                                                    elseif ($GLOBALS['fecha4'] > $ano) {
                                                                                        //Rojo
                                                                                        $color = 'style="background-color: #dd4b39; color: white;"';
                                                                                    }
                                                                                    elseif ($GLOBALS['fecha2'] >= $semanaAn and $GLOBALS['fecha3'] >= $mes and $GLOBALS['fecha4'] >= $ano) {
                                                                                        //Naranja
                                                                                        $color = 'style="background-color: #f0ad4e; color: white;"';
                                                                                    }
                                                                                    else{
                                                                                        //Verde
                                                                                        $color = 'style="background-color: #449d44; color: white;"';
                                                                                    }

                                                                                     ?>
                                                                                    <input type="text" name="fecha_fin" value="<?php echo $alumn->fecha_fin; ?>" class="form-control" placeholder="Apellidos" <?php echo "$color"; ?> >
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Monto A Pagar</label>
                                                                                    <input type="text" name="monto" readonly value="<?php echo $alumn->monto; ?>" class="form-control" placeholder="Monto a pagar">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Total Cancelado</label>
                                                                                    <input type="text" name="pago" readonly value="<?php echo $alumn->pago; ?>" class="form-control" placeholder="Total cancelado">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Nota</label>
                                                                                    <textarea name="nota" class="form-control" placeholder="Nota"><?php echo $alumn->nota; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- Fin del cuerpo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                                                    <input type="hidden" name="id" value="<?=$alumn->id;?>">
                                                                    <button type="submit" value="form3" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Guardar Cambios</button>
                                                                </form>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <!-- Fin del Model -->

                                            <?php
                                            $gymxdi = $alumn->gymxdias;
                                            $tiempo_ini = date_create("$alumn->fecha_inicio");
                                            $tiempo = date_create("$alumn->fecha_fin");
                                            $dias = date_format($tiempo, 'd');
                                            $mes = date_format($tiempo, 'm');
                                            $ano = date_format($tiempo, 'Y');
                                            $semanaAn = $dias - 7;
                                            $semanaAc = $dias;
                                            $fecha_inicio = date_create("$alumn->fecha_inicio");
                                            $fecha_fin = date_create("$alumn->fecha_fin");
                                            $gymxd = "$alumn->gymxdias";                                                     

                                            if ($gymxdi >= 1) {
                                                //Azul
                                                $colorp = 'style="background-color: #337ab7; color: white;"';
                                            }
                                            elseif ($GLOBALS['fecha2'] > $semanaAc and $GLOBALS['fecha3'] >= $mes and $GLOBALS['fecha4'] >= $ano) {
                                                //Rojo
                                                $colorp = 'style="background-color: #dd4b39; color: white;"';
                                            }
                                            elseif ($GLOBALS['fecha4'] > $ano) {
                                                //Rojo
                                                $colorp = 'style="background-color: #dd4b39; color: white;"';
                                            }
                                            elseif ($GLOBALS['fecha2'] >= $semanaAn and $GLOBALS['fecha3'] >= $mes and $GLOBALS['fecha4'] >= $ano) {
                                                //Naranja
                                                $colorp = 'style="background-color: #f0ad4e; color: white;"';
                                            }
                                            else{
                                                //Verde
                                                $colorp = 'style="background-color: #449d44; color: white;"';
                                            }

                                                ?>
                                            <td class="text-center" <?php echo "$colorp"; ?>><?php echo $alumn->fecha_fin; ?></td>
                                            
                                            
                                            <td class="text-center"><?php echo $alumn->deuda." S/."; ?></td></td>
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
