
<section class="content" style="padding-top: 0px; padding-bottom: 0px;">
        <section class="content-header" style="padding-bottom: 10px;">
          <h1>
            Asistencia
            <small>Control</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="./?view=index"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <!-- <li><a href="#">Examples</a></li> -->
            <li class="active">Asistencia</li>
          </ol>
        </section>
        <!-- Inicio del ROW separa el slide bar del conenido -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-body">
                      <div class="panel" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: solid orange 1px; border-radius: 5px;">
                      <div class="panel-heading">
                           <input type="search" autofocus id="myInput" class="txthotelname form-control" placeholder="DNI">
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
      document.getElementById("txtHint").innerHTML = "Buscando.. "+showUser(x.value);

  }
</script>
<script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("txtHint").innerHTML="Vacio";
        return;
      } 
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("txtHint").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","./?action=addassistance&q="+str,true);
      xmlhttp.send();

      document.getElementById("myInput").value = "";

    }
</script>
            