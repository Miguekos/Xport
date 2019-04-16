<?php
include 'Database.php';
$fecha_actual = date('Y-m-d');
// echo $fecha_actual;
?>

<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <section class="content-header" style="padding-bottom: 5px;">
        <button color="red" onclick="atras()" class="btn">Contabildiad</button> <span style="font-size: 24px;" class="pull-right">Reporte del dia: <?php echo $fecha_actual; ?></span>
        <div class="row">
            <?php
            $sql = "SELECT nombre, SUM(cantidad) cantidad, SUM(total) total FROM ventas WHERE hora LIKE '%$fecha_actual%' GROUP BY nombre limit 500";
            $sql_sumatotal = "select SUM(total) totalsum FROM ventas WHERE hora LIKE '%$fecha_actual%'";
            $result = mysqli_query($con, $sql);
            $result_sum_total = mysqli_query($con, $sql_sumatotal);
            $total_sum = mysqli_fetch_object($result_sum_total);
            //    echo $total_sum->totalsum;
            ?>
            <div class="col-lg-6">
                <h3>
                    Facturas
                </h3>
                <div class="box box-info">
                    <div class="box-body">
                        <table width="100%" class="table table-striped datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-left">Cantidad</th>
                                    <th>Nombres</th>
                                    <th class="text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($ver_asis = mysqli_fetch_object($result)) {
                                    ?>
                                    <tr>
                                        <td style="color: <?php echo $color; ?>"><?= $ver_asis->cantidad; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $ver_asis->nombre; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $ver_asis->total; ?></td>
                                    </tr>

                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td><b><?php echo $total_sum->totalsum; ?></b></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!--Aqui va la nueva tabla de ventas-->
            <?php
            $sql = "SELECT * FROM abonos WHERE fecha_abono LIKE '%$fecha_actual%'";
            $sql_total_abono = "SELECT SUM(abono) abono FROM abonos WHERE fecha_abono LIKE '%$fecha_actual%'";
            $result = mysqli_query($con, $sql);
            $result_abono = mysqli_query($con, $sql_total_abono);
            $total_abono = mysqli_fetch_object($result_abono);
            ?>

            <div class="col-lg-6">
                <h3>
                    Abonos
                </h3>
                <div class="box box-info">
                    <div class="box-body">

                        <table width="100%" class="table table-striped datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th class="text-left">Pagó</th>
                                    <th class="text-left">Deuda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($abonos = mysqli_fetch_object($result)) {
                                    ?>
                                    <tr>
                                        <td style="color: <?php echo $color; ?>"><?= $abonos->nombre; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $abonos->total; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $abonos->deuda; ?></td>
                                    </tr>

                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td><b><?php echo $total_abono->abono; ?></b></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!--Aqui va la nueva tabla de ventas-->
            <?php
            $sql = "SELECT *
            FROM control
            WHERE hora LIKE '%$fecha_actual%'";
            $sql_retiro = "SELECT SUM(cajachica) retiro
            FROM control
            WHERE accion = 'retiro' and hora LIKE '%$fecha_actual%'";
            $sql_deposito = "SELECT SUM(cajachica) deposito
            FROM control
            WHERE accion = 'deposito' and hora LIKE '%$fecha_actual%'";
            $result = mysqli_query($con, $sql);
            $result_sum_retiro = mysqli_query($con, $sql_retiro);
            $result_sum_deposito = mysqli_query($con, $sql_deposito);
            $total_retiro = mysqli_fetch_object($result_sum_retiro);
            $total_deposito = mysqli_fetch_object($result_sum_deposito);
            // $totalcaja = $total_retiro->retiro - $total_deposito->deposito;
            $totalcaja = $total_deposito->deposito - $total_retiro->retiro;
            //    echo $total_sum->totalsum;
            ?>
            <!--Aqui va la nueva tabla de ventas-->

            <div class="col-lg-6">
                <h3>
                    Caja Chica
                </h3>

                <div class="box box-info">
                    <div class="box-body">

                        <table width="100%" class="table table-striped datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-left">Accion</th>
                                    <th>Motivo</th>
                                    <th class="text-left">Gasto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($caja = mysqli_fetch_object($result)) {
                                    ?>
                                    <tr>
                                        <td style="color: <?php echo $color; ?>"><?= $caja->accion; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $caja->motivo; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $caja->cajachica; ?></td>
                                    </tr>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td><b><?php echo $totalcaja; ?></b></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--Aqui va la nueva tabla de ventas-->

            <?php
            $sql = "SELECT *
            FROM gastos
            WHERE hora LIKE '%$fecha_actual%'";
            $sql_retiro = "SELECT SUM(gastos) retiro
            FROM gastos
            WHERE accion = 'retiro' and hora LIKE '%$fecha_actual%'";
            $sql_deposito = "SELECT SUM(gastos) deposito
            FROM gastos
            WHERE accion = 'deposito' and hora LIKE '%$fecha_actual%'";
            $result = mysqli_query($con, $sql);
            $result_sum_retiro = mysqli_query($con, $sql_retiro);
            $result_sum_deposito = mysqli_query($con, $sql_deposito);
            $total_retiro = mysqli_fetch_object($result_sum_retiro);
            $total_deposito = mysqli_fetch_object($result_sum_deposito);
            // $totalgastos = $total_retiro->retiro - $total_deposito->deposito;
            $totalgastos = $total_deposito->deposito - $total_retiro->retiro;
            //    echo $total_sum->totalsum;

            ?>
            <!--Aqui va la nueva tabla de ventas-->

            <div class="col-lg-6">
                <h3>
                    Gastos Varios
                </h3>
                <div class="box box-info">
                    <div class="box-body">
                        <table width="100%" class="table table-striped datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-left">Accion</th>
                                    <th>Motivo</th>
                                    <th class="text-left">Gasto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($gasto = mysqli_fetch_object($result)) {
                                    ?>
                                    <tr>
                                        <td style="color: <?php echo $color; ?>"><?= $gasto->accion; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $gasto->motivo; ?></td>
                                        <td style="color: <?php echo $color; ?>"><?= $gasto->gastos; ?></td>
                                    </tr>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td><b><?php echo $totalgastos; ?></b></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row col-lg-12">

                <div class="col-lg-3">
                    <div class=" box box-primary">
                        <div class="box-body">
                            Facturas: <span class="pull-right"><b><?php echo $total_sum->totalsum; ?></b> .S/</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class=" box box-primary">
                        <div class="box-body">
                            Ventas <span class="pull-right"><b><?php echo $total_abono->abono; ?></b> .S/</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class=" box box-primary">
                        <div class="box-body">
                            Caja Chica <span class="pull-right"><b><?php echo $totalcaja; ?></b> .S/</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class=" box box-primary">
                        <div class="box-body">
                            Gastos Varios <span class="pull-right"><b><?php echo $totalgastos; ?></b> .S/</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script>
    function atras() {
        window.location.href = "./?view=filtroporfecha";
    }
</script>