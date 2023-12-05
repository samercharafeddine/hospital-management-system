<?php
include("connection.php");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$query = $mysqli->prepare('select medication_id,patient_id,doctor_id,name,description from rooms ');

if (!$query) {
    die("Query preparation failed: " . $mysqli->error);
}

if (!$query->execute()) {
    die("Query execution failed: " . $query->error);
}

$query->store_result();
$query->bind_result($medication_id, $patient_id, $doctor_id,$name,$description);

$response = [];
while ($query->fetch()) {
    $row = [
        'medication_id' => $medication_id,
        'patient_id' => $patient_id,
        'doctor_id' => $doctor_id,
        'name'=> $name,
        'description'=> $description
    ];
    $response[] = $row;
}

echo json_encode($response);