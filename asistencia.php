<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */

$server = "localhost";
$name_db = "fitseven_miguel";
$pass_db = "Alexkos12.";
$db = "fitseven_gymsport";

 //Captura el ID
 $q = $_GET["q"];
 //Con esto personalizo el nombre del archivo exportado
 $nombre = "Asistencia".$q.".xlsx";
 $conexion = new mysqli($server,$name_db,$pass_db,$db);
 $sql="SELECT * FROM `assistance` WHERE `person_id` = '".$q."'";
 $resultado = mysqli_query($conexion, $sql);
 $registros = mysqli_fetch_row($resultado);
 
 if ($registros > 0) {
   require_once 'Classes/PHPExcel.php';
   //$objPHPExcel = new PHPExcel();
   $objReader = new PHPExcel_Reader_Excel2007();
   $objPHPExcel = $objReader->load("Asistencia.xlsx");


   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("miguekos1233@gmail.com")
        ->setLastModifiedBy("miguekos1233@gmail.com")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Asistencia")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("miguekos1233@gmail.com  con  phpexcel")
        ->setCategory("Asistencia");

    // Renombrar Pestaña
	$objPHPExcel->getActiveSheet()->setTitle('Asistencia'); 

   $i = 2;    
   while ($registro = mysqli_fetch_object($resultado)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
            // ->setCellValue('A'.$i, $registro->person_id)
            ->setCellValue('B'.$i, $registro->date_at);
 
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