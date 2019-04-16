<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php 
include 'Database.php';
$sql = "select * from productos";
$sql = mysqli_query($con,$sql);
// $producto = mysqli_fetch_object($sql);
// $productos = $producto[0];
// echo $producto->nombre;

 ?>

                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Productos
                    <a href="./?view=nuevoproducto" class="btn btn-success">Agregar</a>
                  </h1>
                </section>
                <!-- Inicio del ROW separa el slide bar del conenido -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="box box-warning">
                            <div class="box-body">
        <table class="table datatable table-bordered table-hover table-striped">
                <thead>
	                    <tr>
	                      <th>Id</th>
	                      <th>Categoria</th>
	                      <th>Nombre</th>
	                      <th>Marca</th>
	                      <th class="text-center">Peso</th>
	                      <th class="text-center">Cantidad</th>
	                      <th class="text-center">Precio</th>
	                      <th class="text-center">Accion</th>
	                    </tr>
                </thead>
                <tbody>
                    <?php while($record = mysqli_fetch_object($sql)) {  ?>
                    <tr>
                      <td><?php echo $record->id ?></td>
                      <td><?php echo $record->categoria ?></td>
                      <td><?php echo $record->nombre ?></td>
                      <td><?php echo $record->marca ?></td>
                      <td class="text-center"><?php echo $record->peso ?></td>
                      <td class="text-center"><?php echo $record->cantidad ?></td>
                      <td class="text-center"><?php echo "<b>" . $record->precio . "</b> S/" ?></td>
                      <td class="text-center">
                          <a class="btn btn-xs btn-warning" href="./?view=editarProducto&id=<?php echo $record->id ?>">Editar</a>
                      </td>
                    </tr>

                    <?php } ?>
                </tbody>
        </table>
      </div>
      </div>
      </div>
      </div>
      <!-- /.row -->
      </section>
