<?php 

    $id = $_GET['id'];
    // echo $id;

    include 'Database.php';
    mysqli_select_db($con,"ajax_demo");

    $editarP = "Select * from productos where id = '$id'";
    // echo $editarP;
    $editarPro = mysqli_query($con,$editarP);
    $rowX = mysqli_fetch_object($editarPro);
    // echo $rowX->nombre;
    // echo $rowX->categoria;

?>
<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Editar Producto
                  </h1>
                </section>
                <!-- Inicio del ROW separa el slide bar del conenido -->
                <div class="row">
                    <div class="col-lg-12">
                    
                        <div class="box box-warning">
                            <div class="box-body">
           <form role="form" action="./?action=actualizarProducto" method="post">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">                                
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                    <select class="form-control required" id="categoria" name="categoria" maxlength="128">
                                    <?php 
                                    $editarP = "Select * from productos where id = '$id'";
                                        // echo $editarP;
                                        $editarPro = mysqli_query($con,$editarP);
                                        while( $record = mysqli_fetch_object($editarPro)) {

                                    ?>
                                            <option value="<?php echo $record->categoria; ?>"><?php echo $record->categoria; ?></option>
                                    <?php 
                                            }
                                    ?>
                                    </select>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control required" id="nombre" value="<?php echo $rowX->nombre; ?>" name="nombre" maxlength="128">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control required" id="marca" value="<?php echo $rowX->marca; ?>" name="marca" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="peso">Peso</label>
                                <input type="text" class="form-control required equalTo" id="peso" value="<?php echo $rowX->peso; ?>" name="peso" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control required" id="cantidad" value="<?php echo $rowX->cantidad; ?>" name="cantidad" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control required equalTo" step="any" id="precio" value="<?php echo $rowX->precio; ?>" name="precio" maxlength="10">
                            </div>
                        </div>
                        
                    </div>
                    <div class="box-footer">
                    <input type="hidden" class="form-control" id="id" value="<?php echo $rowX->id; ?>" name="id">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                            <!-- <input type="reset" class="btn btn-default" value="Limpiar" /> -->
                    </div>
            </form>
    </div>               
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                </section>