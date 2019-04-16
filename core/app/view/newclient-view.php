<section class="content" style="padding-top: 0px; padding-bottom: 0px;">


<?php

include 'Database.php';

//Identificar el ID maximo actual

$sql  = "SELECT * FROM membresia";
$result = mysqli_query($con,$sql);

// $mem = mysqli_fetch_object($membresia);



    // echo $row['nombre'];



        // }

?>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                // document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","./?action=cargarmebresia&q="+str,true);
        xmlhttp.send();
    }
}
</script>


<section class="content-header" style="padding-bottom: 10px;">
          <h1>
            Nuevo Cliente
            <!-- <small><b>N° <?php echo $mem->nombre; ?></b></small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Nuevo Cliente</li>
          </ol>
        </section>

                <div class="row">
                    <div class="col-md-12">

                <form id="form3" action="./?action=addclient" method="POST">
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
                                    <select name="membresia_c" onchange="showUser(this.value),myFunction()" class="form-control">
                                            <option>---ELIGE UNA MEMBRESIA---</option>
                                        <?php while($row = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </form>

                                <div class="form-group col-lg-12" id="txtHint">
                                  <!-- Aqui se muestra las membresias -->
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
                                    <input type="text" name="ruc_dni" class="form-control" placeholder="Ruc o DNI">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Telf</label>
                                    <input type="text" name="telf" class="form-control" placeholder="Telf">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nombre Completo</label>
                                    <input type="text" name="razon_social" class="form-control" placeholder="Razon Social">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Direccion</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Boleta N°:</label>
                                    <input type="text" name="boleta" required class="form-control" placeholder="Numero de Boleta">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Atendido Por:</label>
                                    <input type="text" readonly value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?>" name="atendido" required class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nota</label>
                                    <textarea name="nota"  class="form-control" placeholder="Nota"></textarea>
                                </div>
                                <div class="form-group col-lg-12 text-center">

                                    <button type="submit" onclick="guardar()" class="btn btn-block btn-warning">Agregar</button>
                                </div>
                                <input type="hidden" name="update_at" value="<?php echo $date; ?>">
                    </div>
                </div>
                <div id="snackbar">Guardado..N° <?php echo $GLOBALS['max_id'] + 1 ?></div>
            </form>

                    </div>
                    <div class="col-lg-3">


                    </div>
                </div>
                <!-- /.row -->

</section>
