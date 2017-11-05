<?php

$connect = mysqli_connect("localhost", "root", "", "test_db");

include ("PHPExcel/IOFactory.php");
$html = <table border = '1'>";
$objPHPExcel = PHPExcel/IOFactory::load('Starfish HackPSU Data.xls');
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
{
	
}

?>