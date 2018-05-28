<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */

$server = "localhost";

//  $name_db = "root";
//  $pass_db = "";
//  $db = "lbadmin";
$name_db = "fitseven_miguel";
$pass_db = "Alexkos12.";
$db = "fitseven_lbadmin";

//Con esto personalizo el nombre del archivo exportado
date_default_timezone_set('America/Lima');
$fechaA = date("Y-m-d_g:i_a");
$nombre = "PorVencer_".$fechaA.".xlsx";

 $conexion = new mysqli($server,$name_db,$pass_db,$db);
 $sql = "SELECT * FROM `cliente` WHERE DAY(fecha_fin) > 5 AND MONTH(fecha_fin) = DATE_FORMAT(NOW(),'%m') AND YEAR(fecha_fin) = DATE_FORMAT(NOW(),'%Y') ORDER BY `cliente`.`fecha_fin` ASC";
 $resultado = mysqli_query($conexion, $sql);
 $registros = mysqli_fetch_row($resultado);
 
 if ($registros > 0) {
   require_once 'Classes/PHPExcel.php';
   //$objPHPExcel = new PHPExcel();
   $objReader = new PHPExcel_Reader_Excel2007();
   $objPHPExcel = $objReader->load("PorVencer.xlsx");


   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("miguekos1233@gmail.com")
        ->setLastModifiedBy("miguekos1233@gmail.com")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("PorVencer")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("miguekos1233@gmail.com  con  phpexcel")
        ->setCategory("PorVencer");

    // Renombrar Pestaña
	$objPHPExcel->getActiveSheet()->setTitle('PorVencer'); 

   $i = 3;    
   while ($registro = mysqli_fetch_object($resultado)) {
       
      $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('A'.$i, $registro->id)
      ->setCellValue('B'.$i, $registro->nombre)
      ->setCellValue('C'.$i, $registro->apellido)
      ->setCellValue('D'.$i, $registro->email)
      ->setCellValue('E'.$i, $registro->telf)
      ->setCellValue('F'.$i, $registro->dni)
      ->setCellValue('G'.$i, $registro->fecha_fin)
      ->setCellValue('H'.$i, $registro->nota)
      ->setCellValue('I'.$i, $registro->atendido)
      ->setCellValue('J'.$i, $registro->contrato);
 
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