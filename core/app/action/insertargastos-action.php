<?php
include('Database.php');

$accion = $_POST['accion'];
// echo $accion;

if ($accion == "deposito" or $accion == "retiro") {
  $gastos = $_POST['gastos'];
  $motivo = $_POST['motivo'];

  $sql = "insert into gastos (gastos, accion, motivo, hora) values ('$gastos','$accion','$motivo','$date')";
  // echo $sql;
  $sql = mysqli_query($con,$sql);

  Core::redir("./?view=gastosvarios");
}else{
  ?>
<script type="text/javascript">
  alert("Debes selecionar una accion Retiro/Deposito");
</script>
  <?php
  Core::redir("./?view=gastosvarios");
}
?>