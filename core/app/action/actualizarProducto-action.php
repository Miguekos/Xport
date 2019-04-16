    <?php 
	
		//echo "$q";

		$q = $_POST['id'];
		$categoria = $_POST['categoria'];
	    $nombre = $_POST['nombre'];
	    $marca = $_POST['marca'];
	    $peso = $_POST['peso'];
	    $cantidad = $_POST['cantidad'];
	    $precio = $_POST['precio'];

		include 'Database.php';

		mysqli_select_db($con,"");
		// $sql="update productos set (categoria, nombre, marca, peso, cantidad, precio) values ('$categoria', '$nombre', '$marca', '$peso', $cantidad, $precio) WHERE id = '".$q."'";

		$sql="UPDATE productos SET categoria='$categoria', nombre='$nombre', marca='$marca', peso='$peso', cantidad='$cantidad', precio='$precio' WHERE id = '$q'";
		
		// echo $sql;
	    $result = mysqli_query($con,$sql);


    ?>
    <script type="text/javascript">
    	window.location.replace('./?view=productos');
    </script>