<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Nuevo Producto
                  </h1>
                </section>
                <!-- Inicio del ROW separa el slide bar del conenido -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="box box-warning">
                            <div class="box-body">

            <form action="./?action=insertarProducto" method="post">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                    <select class="form-control required" id="categoria" name="categoria" maxlength="128">
                                    <?php
                                        include 'Database.php';
                                        mysqli_select_db($con,"");
                                        $editarP = "Select * from categorias";
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
                                <input type="text" class="form-control" id="nombre"  required name="nombre" maxlength="128">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control" id="marca"  required name="marca" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="peso">Peso</label>
                                <input type="text" class="form-control equalTo" id="peso" required name="peso" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad"  required name="cantidad" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control equalTo" step="any" id="precio" required name="precio" maxlength="10">
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
                            <input type="reset" class="btn btn-default" value="Limpiar" />
                    </div>
            </form>
    </div>


      </div>
      </div>
      </div>
      </div>
      <!-- /.row -->
      </section>
