<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="assets\js\caja.js"></script>
<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("cajajs").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cajajs").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","./?action=getitem&q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php
    include 'Database.php';
    mysqli_select_db($con,"ajax_demo");
    $id_factura = "Select id_factura from ventas order by id_factura desc limit 1";
    $resultF = mysqli_query($con,$id_factura);
    $row = mysqli_fetch_array($resultF);
    $fact = $row[0] + 1;
?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
<?php
$data["posts"]=ClientData::getAll();
?>
                <section class="content-header" style="padding-bottom: 10px;">
                  <h1>
                    Caja Registradora
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="./?view=newclient"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <!-- <li><a href="#">Examples</a></li> -->
                    <li class="active">Clientes</li>
                  </ol>
                </section>
                <!-- Inicio del ROW separa el slide bar del conenido -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="box box-warning">
                            <div class="box-body">

                <div class="col-lg-3 has-success">
                    ID: <input class="form-control" readonly type="number" id="iddd">
                </div>

                <div class="col-lg-6 has-success">
                    Producto / ID: <input autocomplete="off" class="form-control" autofocus type="text" id="id" onkeydown="imprimir(),anularTab()" onkeyup="showHint(this.value)">
                                    <input autocomplete="off" class="form-control" type="hidden" id="precioP">
                                    <input autocomplete="off" class="form-control" type="hidden" id="idPP">
                                    <input autocomplete="off" class="form-control" type="hidden" id="obtenerC">
                </div>

                <div class="col-lg-3 has-success">
                    Cantidad: <input class="form-control" onchange="validar()" onkeydown="enter2(),anularTab()" type="number" name="cantidad" id="monto" required="true">
                </div>

                <div class="text-center" style="padding-bottom: 2%;">
                    <button id="btn" onkeyup="agregarProducto(),operar('multiplicar'),nombres(),clean(),enter6()" style="border-top-width: 1px; margin-top: 10px;" class="btn sombra btn-success btn-sm">Factura No: <?php echo $fact; ?> </button>
                </div>

                <!-- Aqui se muestra la Tabla Cuando se realiza la busqueda por ID -->
                <p> <span id="cajajs"></span></p>

                <form action="./?action=guardar" method="POST">
                    <input type="hidden" name="Nfactura" value="<?php echo $fact; ?>">


                    <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
                    <table id="TablaPro example" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:55%">Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="ProSelected">
                            <!--Ingreso un id al tbody-->
                            <tr>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td><input type="hidden" class="form-control" id="items" name="items" /></td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="hidden" id="total_1" name="total_1" value="0" /> <span class="form-control" type="" id="total_final" name="total_final" value="0" readonly> </span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tfoot>
                    </table>
                    <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
                    <label class="text-center">Pago del Cliente</label>
                    <div class="pull-right form-group has-error has-feedback" style="width: 100%;">
                        <input type="number" step="0.01" required id="imprimir" name="pagado" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm sombra btn-success btn-fill pull-right">Imprimir</button>
                        <a class="btn sombra btn-sm btn-danger pull-left" href="./?view=ventas">Limpiar</a>
                        <a class="btn sombra btn-sm btn-info" onclick="nombres()">Calcular</a>
                    </div>

                    <div class="form-group col-sm-3">

                      Responsable:<input type="text" class="form-control" readonly value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?>" name="atendido">
                      <input type="hidden" class="form-control col-sm-6" readonly value="<?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->id;} ?>" name="id_user">
                    </div>

                </from>
    </div>
    </div>
    </div>
  </div>
  <script>

function anularTab(){
    if (event.keyCode == 9)
    {
    //   $('#monto').focus();
    //   $('#monto').val('');
      event.returnValue=false;
      console.log("Anular Tab");
    }
}
</script>
