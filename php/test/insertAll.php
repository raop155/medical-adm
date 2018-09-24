<?php

include '../db_connection/connection.php';

/*
$stmt = $conn->prepare("INSERT INTO diseases(disease_id, name)
    VALUES(:disease_id, :name)");
$stmt->execute(array(
    "disease_id" => "M20.1",
    "name" => "RAÑOYP VALGUS"
));
 */


$file = "../mysql/medical-report2.csv";
$handle = fopen($file, "r");
$c = 0;
while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
    $filesop = array_map("utf8_encode", $filesop);
    $name = $filesop[0];
    $disease_id = $filesop[1];

    $stmt = $conn->prepare("INSERT INTO diseases(disease_id, name)
    VALUES(:disease_id, :name)");
    $stmt->execute(array(
        "disease_id" => $disease_id,
        "name" => $name
    ));

}


$conn = null;
?>
