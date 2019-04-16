<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Admin | Inicio</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


  <link rel="stylesheet" href="custom/snackbar.css">
  <!-- <link rel="stylesheet" href="custom/w3.css"> -->
  <link rel="stylesheet" href="custom/tooltip.css">
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="bower_components\bootstrap-datetimepicker\build\css\bootstrap-datetimepicker.css" />

  <!-- Font Awesome Icons -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" /> -->
  <link href="plugins/dist/css/skins/skin-black.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <script src="plugins/tinymce/tinymce.min.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">

  <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
  <script src="plugins/morris/raphael-min.js"></script>
  <script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">
  <script src="plugins/jspdf/jspdf.min.js"></script>
  <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
  <!-- highcharts -->
  <script src="plugins/highcharts.js"></script>
  <script src="plugins/exporting.js"></script>

</head>
<style media="screen">
  .barra {
    float: left;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
    font-family: fontAwesome;
  }
</style>
<?php
include('Database.php');
include('totales.php');
?>
<!-- 
sidebar-collapse -- > Mini
skin-blue        -- > Color
sidebar-mini     -- > Mini
 -->
<body class="<?php if (isset($_SESSION["user_id"])) : ?>sidebar-mini skin-blue sidebar-collapse <?php else : ?>login-page<?php endif; ?>">
  <div class="wrapper">
    <!-- Main Header -->
    <?php if (isset($_SESSION["user_id"])) : ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b>GYM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">GYM<b> Xport</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>


          <div class="barra">
            Total en Caja: <?php echo $total_caja; ?>
          </div>

          <!-- Navbar Right Menu -->

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"> <?php echo $total_deudores + $total_vencidos; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Alertas</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <!-- start message -->
                        <a href="./index.php?view=verasistencia">
                          <!--                                        <div class="pull-left">-->
                          <!--                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                          <!--                                        </div>-->
                          <h4>
                            Deudores
                            <small><i class="fa fa-clock-o"></i> <?php echo $total_deudores ?> </small>
                          </h4>
                          <p>Clientes deudores el dia de hoy <?php echo $total_deudores ?></p>
                        </a>
                      </li>
                      <li>
                        <!-- start message -->
                        <a href="./index.php?view=verasistencia">
                          <div class="pull-left">
                            <!--                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                          </div>
                          <h4>
                            Vencidos
                            <small><i class="fa fa-clock-o"></i> <?php echo $total_vencidos ?> </small>
                          </h4>
                          <p>Clientes vencidos el dia de hoy <?php echo $total_vencidos ?></p>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <!--                        <li class="footer"><a href="#">See All Messages</a></li>-->
                </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">




                  <img src="dist/img/avatar5.png" class="user-image" alt="User Image">


                  <span class="hidden-xs"><?php if (isset($_SESSION["user_id"])) {
                                            echo UserData::getById($_SESSION["user_id"])->name . " ";
                                          } {
                                            echo UserData::getById($_SESSION["user_id"])->lastname;
                                          } ?> </span><b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                    <p>
                      <?php if (isset($_SESSION["user_id"])) {
                        $kind = UserData::getById($_SESSION["user_id"])->kind;
                      } ?>
                      <?php
                      if ($kind == 1) {
                        echo "Administrador";
                        # code...
                      } else {
                        echo "Usuario";
                      }

                      ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">
                      <!--                 <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div> -->
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!--                 <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="./?action=processlogout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>


              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">


            <li class="header text-center">ADMINISTRACION</li>
            <?php if (isset($_SESSION["user_id"])) : ?>

              <li><a href="./"><i class='fa fa-dashboard'></i> <span>Escritorio</span></a></li>

              <li class="treeview">
                <a href="#">
                  <i class='fa fa-users'></i>
                  <span>Membresias</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li> -->
                  <!-- <li><a href="./index.php?view=newclient"><i class='fa fa-users'></i> <span>Nueva Membresia</span></a></li> -->
                  <li><a href="./index.php?view=client"><i class='fa fa-check-square'></i> <span>Membresias</span></a></li>
                  <li><a href="./index.php?view=clientdeudas"><i class='fa fa-check-square'></i> <span>Vencidos</span></a></li>
                  <!-- <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
                  <li><a href="/agregarasistencia.php" target="_blank"><i class='fa fa-check'></i> <span>Asistencia</span></a></li>
                  <li><a href="./index.php?view=verasistencia"><i class='fa fa-check'></i> <span>Ver Asistencia</span></a></li>
                  <li><a href="./index.php?view=control"><i class='fa fa-sitemap'></i> <span>Control</span></a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class='fa fa-star'></i>
                  <span>Pormociones</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li> -->
                  <li><a href="./index.php?view=membresia"><i class='fa fa-check-square'></i> <span>Pormociones</span></a></li>
                  <!-- <li><a href="./index.php?view=newmembresia"><i class='fa fa-users'></i> <span>Nueva Pormociones</span></a></li> -->
                  <!-- <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class='fa fa-dollar'></i>
                  <span>Ventas</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="./index.php?view=ventas"><i class='fa fa-check-square'></i> <span>Ventas</span></a></li>
                  <li><a href="./?view=factura"><i class='fa fa-check'></i> <span>Facturas</span></a></li>
                  <!-- <li><a href="./?view=filtroporfecha"><i class='fa fa-check'></i> <span>Reporte Por Fechas</span></a></li> -->
                  <li><a href="./index.php?view=abono"><i class='fa fa-check'></i> <span>Abono (Pagos)</span></a></li>
                  <li><a href="./index.php?view=productos"><i class='fa fa-folder'></i> <span>Productos</span></a></li>
                  <li><a href="./index.php?view=cajachica"><i class='fa fa-money'></i> <span>Caja Chica</span></a></li>
                  <li><a href="./index.php?view=gastosvarios"><i class='fa fa-money'></i> <span>Gastos Varios</span></a></li>
                  <li><a href="./index.php?view=cierre"><i class='fa fa-credit-card'></i> <span>Contabilidad</span></a></li>
                </ul>
              </li>

              <?php if (Core::$user->kind == 1) : ?>

                <li><a href="./index.php?view=empleados"><i class='fa fa-wrench'></i> <span>Empleados</span></a></li>
                <li><a href="./index.php?view=users"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
                <li><a href="./index.php?view=filtroporfecha"><i class='fa fa-sitemap'></i> <span>Reportes</span></a></li>
              <?php endif; ?>
            <?php endif; ?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif; ?>

    <!-- Content Wrapper. Contains page content -->
    <?php if (isset($_SESSION["user_id"])) : ?>
      <div class="content-wrapper">
        <?php View::load("index"); ?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>Xport GYM - miguekos1233@gmail.com &copy; 2019</strong>
      </footer>
    <?php else : ?>

      <div class="login-box">
        <div class="login-logo">
          <a href="./">GYM <b> XPORT</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
          <form action="./?action=processlogin" method="post">
            <div class="form-group has-feedback">
              <input type="text" name="username" autofocus required class="form-control" placeholder="Usuario" />
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" required class="form-control" placeholder="Password" />
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
              </div><!-- /.col -->
            </div>
          </form>
        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->

    <?php endif; ?>

  </div><!-- ./wrapper -->
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="plugins/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="plugins/dist/js/demo.js"></script>
  <!-- AdminLTE App -->
  <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>
  <!-- page script -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".datatable").DataTable({
        "processing": true,
        "deferLoading": 10,
        // "ordering":true,
        "order": [
          [0, "desc"]
        ],
        "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
      });

    });
  </script>

  <!-- Select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/input-mask/jquery.inputmask.js"></script>
  <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script src="custom/moment.js"></script>
  <script type="text/javascript" src="bower_components\bootstrap-datetimepicker\build\js\bootstrap-datetimepicker.min.js"></script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'DD/MM/YYYY h:mm A'
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Dias': [moment(), moment().subtract(-6, 'days')],
            '30 Dias': [moment(), moment().subtract(-29, 'days')],
            '3 Meses': [moment(), moment().subtract(-87, 'days')],
            'Este Mes': [moment().startOf('month'), moment().endOf('month')],
            'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#daterange-btn span').html(start.format('D, MMMM, YYYY') + ' - ' + end.format('D, MMMM, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>

  <script type="text/javascript">
    function guardar() {
      // Get the snackbar DIV
      var x = document.getElementById("snackbar")

      // Add the "show" class to DIV
      x.className = "show";

      // After 3 seconds, remove the show class from DIV
      setTimeout(function() {
        x.className = x.className.replace("show", "");
      }, 3000);
    }

    function actualizar() {
      // Get the snackbar DIV
      var x = document.getElementById("snackbar")

      // Add the "show" class to DIV
      x.className = "show";

      // After 3 seconds, remove the show class from DIV
      setTimeout(function() {
        x.className = x.className.replace("show", "");
      }, 3000);
    }

    console.log(moment().format('MMMM Do YYYY, h:mm:ss a'));
  </script>
</body>

</html>