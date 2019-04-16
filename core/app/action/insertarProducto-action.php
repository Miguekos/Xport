        <?php 
    

        $categoria = $_POST['categoria'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $peso = $_POST['peso'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        include 'Database.php';

        mysqli_select_db($con,"");
        $sql="insert into productos (categoria, nombre, marca, peso, cantidad, precio) value ('$categoria', '$nombre', '$marca', '$peso', $cantidad, $precio)";
        // echo $sql;
        $result = mysqli_query($con,$sql);





    ?>

    <script type="text/javascript">
        window.location.replace('./?view=productos');
    </script>