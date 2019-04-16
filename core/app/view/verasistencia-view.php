<?php

    include 'Database.php';

    $sql  = "select * from assistance order by id desc limit 500";
    $result = mysqli_query($con,$sql);
    // while($ver_asis = mysqli_fetch_object($result)){
    // 	$num_asis = $ver_asis->person_id;

    // 	$sql1  = "select * from cliente where id = $num_asis";
	   //  $result1 = mysqli_query($con,$sql1);
    // 	$ver_nombre = mysqli_fetch_object($result1);
    	// echo $ver_nombre->nombre ."<br>";
    // }
?>
<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<section class="content-header" style="padding-bottom: 10px;">
  <h1>
    Asistencias </h1>
  <ol class="breadcrumb">
    <!-- <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li> -->
    <!-- <li><a href="#">Examples</a></li> -->
    <!-- <li class="active">Empleados</li> -->
  </ol>
</section>
<div class="row">
    <div class="col-lg-12">

        <div class="box box-warning">
            <div class="box-body">

            <table width="100%" class="table table-striped datatable table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th class="text-center">Deuda</th>
                        <th class="text-center">Fecha Venc.</th>
                        <th class="text-center">Promo</th>
                        <th class="text-center">Fecha Asis.</th>
                        <!-- <th class="text-center">Accion</th> -->
                        <!-- <th>Estado</th> -->
                    </tr>
                </thead>
                <tbody>
                	<?php
                    while($ver_asis = mysqli_fetch_object($result)){
					    	$num_asis = $ver_asis->person_id;
                            $num_id = $ver_asis->id;
                            $deudor = $ver_asis->deuda;
                            $vencidos = $ver_asis->vencimiento;

					    	$sql1  = "select * from cliente where id = $num_asis";
						    $result1 = mysqli_query($con,$sql1);
					    	$post = mysqli_fetch_object($result1);
					    	// echo $ver_nombre->nombre ."<br>";

                            $sql11  = "select * from assistance where id = $num_id";

                            $result11 = mysqli_query($con,$sql11);
                            $posts = mysqli_fetch_object($result11);

                            $item6 = $posts->create_at;
                            include('format_fecha.php');
                            if ($deudor == 1 or $vencidos == 1) {
                                $color = "red";
                            }else {
                                $color = "";
                            };
					                       ?>
                    <tr>
                        <td style="color: <?php echo $color; ?>"><?=$posts->id;?></td>
                        <td style="color: <?php echo $color; ?>"><?=$post->nombre;?></td>
                        <td style="color: <?php echo $color; ?>"><?=$post->dni;?></td>
                        <td style="color: <?php echo $color; ?>" class="text-center"><?=$post->deuda;?></td>
                        <td style="color: <?php echo $color; ?>" class="text-center"><?=$post->fecha_fin;?></td>
                        <td style="color: <?php echo $color; ?>" class="text-center"><?=$post->nombre_mem;?></td>
                        <td style="color: <?php echo $color; ?>" class="text-center"><?php echo $fecha_lista;?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
                </div>
        </div>
    </div>
</div>
