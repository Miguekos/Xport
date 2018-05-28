<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
if(isset($_SESSION["user_id"])):
	$user = UserData::getById($_SESSION["user_id"]);
?>
<?php
$data["posts"]=EmpleadosData::getAll();
?>
<section class="content-header" style="padding-bottom: 10px;">
  <h1>
    Empleados
    <a href="./?view=newem" class="btn btn-success">Agregar</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <!-- <li><a href="#">Examples</a></li> -->
    <li class="active">Empleados</li>
  </ol>
</section>
<!-- Inicio del ROW separa el slide bar del conenido -->
<div class="row">
    <div class="col-lg-12">
    
        <div class="box box-danger">
            <div class="box-body">

            <table width="100%" class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>DNI</th>
                                <th class="text-center">Inicio</th>
                                <th class="text-center">Cargo</th>
                                <th class="text-center">Accion</th>
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
                            $gymxd = "$post->gymxdias";
            ?>
                            <tr>
                                <td><?=$post->id;?></td>
                                <td data-toggle="modal" data-target="<?php echo "#".$post->id; ?>"><?=$post->nombre;?> <?=$post->apellido;?></td>
                                
                                <!-- Modal -->
                                <div style="" class="modal fade" id="<?php echo $post->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title text-center" id="myModalLabel"><label class="pull-left"><?php echo "Boleta ".$post->boleta; ?></label><b>ID:</b> <?php echo $post->id; ?></h4>
                                                </div>
                                                <!-- Cuerpo del Model -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="" style="background-color: ; border-radius: 10px;">
                                                            <div class="panel-body">
                                                              <img class="img-rounded" src="dist/img/avatar5.png" alt="Avatar" style="width:100%">
                                                              <br>
                                                          </div>  
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="" style="background-color: ; border-radius: 10px;">
                                                            <div class="panel-body">
                                                                <?php 
                                                                $server = "localhost";
                                                                $name_db = "root";
                                                                $pass_db = "";
                                                                $db = "lbadmin";

                                                                $conexion = new mysqli($server,$name_db,$pass_db,$db);

                                                                $query  = "SELECT date_at FROM `assistance` WHERE person_id = '$post->id'";
                                                                $result = mysqli_query($conexion, $query);
                                                                // $asis_emp = mysqli_fetch_row($result);
                                                                // $total_asis_emp = $asis_emp[0];
                                                                echo "<div class='text-center'><h3>Asistencia: </h3></div>";
                                                            
                                                                while ($asis_emp = mysqli_fetch_row($result)) {     
                                                                    $dd = $asis_emp[0];
                                                                    echo "<div class='text-center'>".$dd."<br></div>";

                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Fin del cuerpo -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                                    <input type="hidden" name="id" value="<?=$post->id;?>">
                                                    <button type="submit" value="form3" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Guardar Cambios</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <td><?=$post->dni;?></td>
                                <td class="text-center"><?php echo date_format($fecha_inicio,"d/m/Y"); ?></td>
                                <td class="text-center"><?=$post->cargo;?></td>
                                <td class="text-center" style="width:100px;">
                                <a href="./?view=editem&id=<?=$post->id;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
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
<?php else: Core::redir("./"); endif;?>