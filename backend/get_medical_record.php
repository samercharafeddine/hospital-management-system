<?php
include("connection.php");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$query = $mysqli->prepare('select medical_record_id,patient_id,doctor_id,description from medical_records ');

if (!$query) {
    die("Query preparation failed: " . $mysqli->error);
}

if (!$query->execute()) {
    die("Query execution failed: " . $query->error);
}

$query->store_result();
$query->bind_result($medical_record_id, $patient_id, $doctor_id,$description);

$response = [];
while ($query->fetch()) {
    $row = [
        'medical_record_id' => $medical_record_id,
        'patient_id' => $patient_id,
        'doctor_id' => $doctor_id,
        'description' => $description,
    ];
    $response[] = $row;
}

echo json_encode($response);