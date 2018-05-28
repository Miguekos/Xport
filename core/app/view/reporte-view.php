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
        
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-danger">
                    <div class="box-body">
                      <div class="col-lg-3">
                        <input type="search" autofocus id="myInput" class="txthotelname form-control" placeholder="Buscar por ID...">
                      </div>

                    </div>
                </div>
             </div>
          </div>

          <div class="text-center">
          <table class="text-center">
          <p class="text-center" id="txtHint">No hay datos.</p>
          </table>
          </div>
          
</section>

<script>
document.getElementById("myInput").addEventListener("search", myFunction);

function myFunction() {
    var x = document.getElementById("myInput");
    document.getElementById("demo").innerHTML = "You are searching for: " + showUser(x.value);
}
</script>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
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
  xmlhttp.open("GET","./?action=loadlist&q="+str,true);
  xmlhttp.send();
}
</script>


</section>