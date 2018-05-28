<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin | Inicio</title>

    

    
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    

    <link rel="stylesheet" href="custom/snackbar.css">
    <link rel="stylesheet" href="custom/w3.css"> 
    <link rel="stylesheet" href="custom/tooltip.css">
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
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
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
  <?php


   ?>
  <body class="<?php if(isset($_SESSION["user_id"])):?>sidebar-mini skin-yellow <?php else:?>login-page<?php endif; ?>" >
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"])):?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">GYM<b>Sport</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


          <!--<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success"><?php echo $GLOBALS['max_deu'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes <?php echo $GLOBALS['max_deu'] ?> Notificaciones</li>
              <li>
                <ul class="menu">
                  
                  <li>
                    <a href="deudores.php">
                      <i class="fa fa-users text-aqua"></i> <?php echo $GLOBALS['max_deu'] ?> Personas tienen deudas pendientes
                      <i class="text-aqua"></i> <?php echo $GLOBALS['max_deu'] ?> Personas tienen deudas pendientes
                    </a>
                  </li>
                
                </ul>
              </li>
            </ul>
          </li>  -->

          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-warning"><?php echo $GLOBALS['max_ven'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tu tienes <?php echo $GLOBALS['max_ven'] ?> Notificaciones</li>
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="PorVencer.php">
                      <i class="fa fa-users text-aqua"></i> <?php echo $GLOBALS['max_ven'] ?> Vencen este mes
                    </a>
                  </li>                 
                  
                </ul>
              </li>
            </ul>
          </li> -->

              <!-- User Account Menu -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name." ";}{ echo UserData::getById($_SESSION["user_id"])->lastname;} ?> </span><b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php if(isset($_SESSION["user_id"]) ){ $kind = UserData::getById($_SESSION["user_id"])->kind;}?>
                  <?php 
                  if ($kind == 1) {
                    echo "Administrador";
                    # code...
                  }else{
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
            <?php if(isset($_SESSION["user_id"])):?>
              
                <li><a href="./"><i class='fa fa-dashboard'></i> <span>Escritorio</span></a></li>
                
                <li class="treeview">
                  <a href="#">
                    <i class='fa fa-users'></i>
                    <span>Clientes</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li> -->
                    <li><a href="./index.php?view=newclient"><i class='fa fa-users'></i> <span>Nuevo Clientes</span></a></li>
                    <li><a href="./index.php?view=client"><i class='fa fa-users'></i> <span>Clientes</span></a></li>
                    <!-- <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
                    <li><a href="./index.php?view=asistencia"><i class='fa fa-check'></i> <span>Asistencia</span></a></li>
                    <!-- <li><a href="./index.php?view=control"><i class='fa fa-table'></i> <span>Control</span></a></li> -->
                    <li><a href="./index.php?view=reporte"><i class='fa fa-table'></i> <span>Reporte</span></a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class='fa fa-users'></i>
                    <span>Menbresia</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <!-- <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li> -->
                    <li><a href="./index.php?view=membresia"><i class='fa fa-users'></i> <span>Menbresia</span></a></li>
                    <li><a href="./index.php?view=newmembresia"><i class='fa fa-users'></i> <span>Nueva Menbresia</span></a></li>
                    <!-- <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
                    
                  </ul>
                </li>

              <?php if(Core::$user->kind==1):?>
                
                <!-- <li><a href="./index.php?view=empleados"><i class='fa fa-users'></i> <span>Empleados</span></a></li> -->
                <li><a href="./index.php?view=users"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
              <?php endif;?>
            <?php endif;?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"])):?>
      <div class="content-wrapper">
        <?php View::load("index");?>
      </div><!-- /.content-wrapper -->

        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            
          </div>
          <strong>Xport GYM - miguekos1233@gmail.com &copy; 2018</strong>
        </footer>
      <?php else:?>

    <div class="login-box">
      <div class="login-logo">
        <a href="./">XportGYM<b>ADMIN</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" autofocus required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Password"/>
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

      <?php endif;?>

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
      $(document).ready(function(){
        $(".datatable").DataTable({
          "ordering":true,
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
    <script type="text/javascript">
    function operar(x){
        var valor_01 = eval(document.getElementById('pago').value);
        var valor_02 = eval(document.getElementById('monto').value);
        switch(x){
            case('sumar'):
                var resultado = valor_01 + valor_02;
                break;
            case('restar'):
                var resultado = valor_01 - valor_02;
                break;
            case('multiplicar'):
                var resultado = valor_01 * valor_02;
                break;
            case('dividir'):
                var resultado = valor_01 / valor_02;
                break;
        }
        document.getElementById('total').value = resultado;
    }
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

    <script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'    : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 Dias' : [moment(), moment().subtract(-6, 'days')],
          '30 Dias': [moment(), moment().subtract(-29, 'days')],
          '3 Meses': [moment(), moment().subtract(-87, 'days')],
          'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Mes Pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
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
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
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
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }

    function actualizar() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar")

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
    </script>
  </body>
</html>
