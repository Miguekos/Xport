<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Admin | Inicio</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <link href="custom/toastr.min.css" rel="stylesheet" />

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
  <script src="custom/toastr.min.js"></script>

</head>


<body class="sidebar-mini skin-yellow">

  <section class="content" style="padding-top: 0px; padding-bottom: 0px;">
    <section class="content-header" style="padding-bottom: 10px;">
      <h1 style="font-size: 40px" class="text-center">
        Asistencia
        <small>Introduce tu DNI y preciona ENTER.!</small>
      </h1>
    </section>
    <!-- <button onclick="prueba()">Prueba</button> -->
    <!-- Inicio del ROW separa el slide bar del conenido -->
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-warning">
          <div class="box-body">
            <div class="panel" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
              <div class="panel-heading">
                <input type="search" autofocus id="myInput" required class="txthotelname form-control" placeholder="DNI">
              </div>
              <div class="panel-body">
                <div class="form-group col-lg-12">
                  <div id="txtHint" class="text-center"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </section>

  <script>
    document.getElementById("myInput").addEventListener("search", myFunction);

    function myFunction() {
      var x = document.getElementById("myInput");
      document.getElementById("txtHint").innerHTML = "Buscando.. " + showUser(x.value);

    }
  </script>
  <script>
    function showUser(str) {
      if (document.getElementById("myInput").value.length == 0) {
        // alert('Intraduzca su DNI, No deje el campo vacio..!!');
        toastr.info('Intraduzca su DNI, campo vacio..!')
        $('#myInput').val('');
        $('#myInput').focus();

      } else {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "Vacio";
          return;
        }
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "./?action=addassistance&q=" + str, true);
        xmlhttp.send();

        document.getElementById("myInput").value = "";

      }
    }
    // myAudio.play();

    function prueba() {
      toastr.info('Are you the 6 fingered man?')
    }
    $(document).ready(function() {

      // jQuery methods go here...

    });
  </script>