<?php

include '../db_connection/connection.php';

//Had to change this path to point to IOFactory.php.
//Do not change the contents of the PHPExcel-1.8 folder at all.
include('../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

//Use whatever path to an Excel file you need.
$inputFileName = '../mysql/medical-excel.xlsx';

try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' .
        $e->getMessage());
}

$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

for ($row = 1; $row <= $highestRow; $row++) {
    $rowData = $sheet->rangeToArray(
        'A' . $row . ':' . $highestColumn . $row,
        null,
        true,
        false
    );

    $name = $rowData[0][0];
    $disease_id = $rowData[0][1];
    //echo $disease_id . ' ' . $name . '<br/>';

    if (!$disease_id) $disease_id = "NONE$row";

    $stmt = $conn->prepare("INSERT INTO diseases(disease_id, name)
    VALUES(:disease_id, :name)");
    $stmt->execute(array(
        "disease_id" => $disease_id,
        "name" => $name
    ));
}
$conn = null;
?>
