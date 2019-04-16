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
    
        <div class="box box-warning">
            <div class="box-body">

            <table width="100%" class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th class="text-center">Telf</th>
                        <th class="text-center">Cargo</th>
                        <th class="text-center">Sueldo</th>
                        <th class="text-center">Adelantos</th>
                        <th class="text-center">Accion</th>
                        <!-- <th>Estado</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data["posts"] as $post):?>
    
                    <tr>
                        <td><?=$post->id;?></td>
                        <td data-toggle="modal" data-target="<?php echo "#".$post->id; ?>"><?=$post->nombre;?></td>
                        <td><?=$post->dni;?></td>
                        <td class="text-center"><?=$post->telf;?></td>
                        <td class="text-center"><?=$post->cargo;?></td>
                        <td class="text-center"><?=$post->sueldo;?></td>
                        <td class="text-center"><?=$post->adelantos;?></td>
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