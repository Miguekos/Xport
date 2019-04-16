<?php
include('Database.php');

$accion = $_POST['accion'];

if ($accion == "deposito" or $accion == "retiro") {
    $cajac = $_POST['cajac'];
    $motivo = $_POST['motivo'];
    $sql = "insert into control (cajachica, accion, motivo, hora) values ('$cajac','$accion','$motivo','$date')";
    // echo $sql;
    $sql = mysqli_query($con,$sql);
    Core::redir("./?view=cajachica");

}else{
    ?>
    <script type="text/javascript">
      alert("Debes selecionar una accion Retiro/Deposito");
    </script>
    <?php
    Core::redir("./?view=cajachica");
}
?>