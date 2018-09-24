<?php

include '../db_connection/connection.php';

$stmt = $conn->prepare("INSERT INTO diseases(disease_id, name)
    VALUES(:disease_id, :name)");
$stmt->execute(array(
    "disease_id" => "M20.1",
    "name" => "RAÑOYP VALGUS"
));

$conn = null;
?>
