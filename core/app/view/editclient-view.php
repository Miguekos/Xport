<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
    $user = ClientData::getById($_GET["id"]);
?>
<?php
    include 'Database.php';
    $sql  = "SELECT * FROM membresia";
    //$sql  = "SELECT * FROM membresia where id = $cid";
    $result = mysqli_query($con,$sql);
?>
                <!-- Page Heading -->
                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Editar Cliente <?php echo $_GET['id'];  ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                  <a href="./?view=index"><i class="fa fa-dashboard"></i> Escritorio</a>
                            </li>
                            <li>
                                  <a href="./?view=client"><i class="fa fa-users"></i> Clientes</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-asterisk"></i> Editar Cliente
                            </li>
                        </ol>
                    
                </section>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

            <form id="form3" action="./?action=updateclient" method="POST">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
                        <div class="panel-heading">
                            Datos Personales
                        </div>
                            <div class="panel-body">
                                <form>

                                <div class="form-group col-lg-12">
                                    <label>Membresia</label>


                                    <?php 

                                        // $sql  = "SELECT * FROM membresia";
                                        $sql1  = "SELECT * FROM membresia where id = $user->id";
                                        $result1 = mysqli_query($con,$sql1);
                                        $row1 = mysqli_fetch_array($result1);

                                    ?>

                                    <select name="membresia_c" onchange="showUser(this.value),myFunction()" class="form-control">
                                    <!-- <select name="membresia" class="form-control"> -->
                                        <option value="<?php echo $row1['id'] ?>"><?php echo $row1['nombre']; ?></option>
                                        <?php while($row = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </form>

                                <div class="form-group col-lg-12">
                                    <label>Nombre de la Membresia</label>
                                    <input type='text' id='nombre_mem' name='nombre_mem' class='form-control col-lg-12' value='<?php echo $user->nombre_mem; ?>'>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Dias</label>
                                    <input type='text' id='tiempo_mem' name='tiempo_mem' class='form-control col-lg-12' value='<?php echo $user->tiempo_mem; ?>'>
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Precio</label>
                                    <input type='text' id='monto' name='monto' class='form-control col-lg-12' value='<?php echo $user->monto; ?>' >
                                </div>

                                <div class="form-group" id="txtHint">

                                    <b></b>

                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Fecha Inicio*</label>
                                        <input type="date" value="<?php echo $user->fecha_inicio; ?>" id="fecha_inicio" name="fecha_inicio" class="form-control"> 
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Fecha Expiracion*</label>
                                        <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $user->fecha_fin; ?>" class="form-control" placeholder="aaaa-mm-dd">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Fecha Expiracion*</label>
                                        <input type="date" name="fecha_alert" id="fecha_alert" value="<?php echo $user->fecha_alert; ?>" class="form-control" placeholder="aaaa-mm-dd">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-warning" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
                        <div class="panel-heading">
                            Datos Tecnicos
                        </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Ruc o DNI</label>
                                    <input type="text" name="ruc_dni" value="<?php echo $user->dni; ?>" class="form-control" placeholder="Ruc o DNI">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Telf</label>
                                    <input type="text" name="telf" class="form-control" value="<?php echo $user->telf; ?>" placeholder="Telf">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Razon Social</label>
                                    <input type="text" name="razon_social" class="form-control" value="<?php echo $user->nombre; ?>" placeholder="Razon Social">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Direccion</label>
                                    <input type="text" name="direccion" class="form-control" value="<?php echo $user->domicilio; ?>" placeholder="Direccion">
                                </div>
                               
                                <div class="form-group col-lg-6">
                                    <label>Pago del Cliente*</label>
                                    <input type="text" name="pago" id="pago" class="form-control" onkeyup="operar('restar');" value="<?php echo $user->pago; ?>" placeholder="Pago">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Deuda*</label>
                                    <input type="text" id="total" name="deuda" class="form-control" readonly value="<?php echo $user->deuda; ?>" placeholder="Deuda">
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Forma de pago*</label>
                                    <select name="forma_pago" class="form-control">
                                        <option value="<?php echo $user->forma_pago; ?>"><?php echo $user->forma_pago; ?></option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta de Cedrito">Tarjeta de Cedrito</option>
                                        <option value="Tarjeta de Debido">Tarjeta de Debido</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Contrato N°:</label>
                                    <input type="text" name="contrato" required class="form-control" value="<?php echo $user->contrato; ?>" placeholder="Numero de Contrato">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Boleta N°:</label>
                                    <input type="text" name="boleta" required class="form-control" value="<?php echo $user->boleta; ?>" placeholder="Numero de Boleta">
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Atendido Por:</label>
                                    <input type="text" readonly value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?>" name="atendido" required class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nota</label>
                                    <textarea name="nota" class="form-control" placeholder="Nota"><?php echo $user->nota; ?></textarea>
                                </div>
                                <div class="form-group col-lg-12 text-center">
                                    <input type="hidden" name="id" value="<?=$user->id;?>">
                                    <button type="submit" onclick="guardar()" class="btn btn-block btn-warning">Agregar</button>
                                </div>
                    </div>
                </div>
                <div id="snackbar">Guardado..N° <?php echo $GLOBALS['max_id'] + 1 ?></div>
            </form>

        </div>
</section>