<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */
 
$server = "localhost";
$name_db = "root";
$pass_db = "";
$db = "lbadmin";

//Con esto personalizo el nombre del archivo exportado
date_default_timezone_set('America/Lima');
$fechaA = date("Y-m-d g:i a");
$nombre = "Clientes_".$fechaA.".xlsx";

 $conexion = new mysqli($server,$name_db,$pass_db,$db);
 $sql = "SELECT * FROM cliente";
 $resultado = mysqli_query($conexion, $sql);
 $registros = mysqli_fetch_row($resultado);
 
 if ($registros > 0) {
   require_once 'Classes/PHPExcel.php';
   //$objPHPExcel = new PHPExcel();
   $objReader = new PHPExcel_Reader_Excel2007();
   $objPHPExcel = $objReader->load("Clientes.xlsx");


   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("miguekos1233@gmail.com")
        ->setLastModifiedBy("miguekos1233@gmail.com")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Deudores")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("miguekos1233@gmail.com  con  phpexcel")
        ->setCategory("Clientes");

    // Renombrar Pestaña
	$objPHPExcel->getActiveSheet()->setTitle('Deudores'); 

   $i = 3;    
   while ($registro = mysqli_fetch_object($resultado)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $registro->id)
            ->setCellValue('B'.$i, $registro->nombre)
            ->setCellValue('C'.$i, $registro->apellido)
            ->setCellValue('D'.$i, $registro->telf);
      $i++;
      
   }
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='."$nombre");
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
mysql_close ();
?>