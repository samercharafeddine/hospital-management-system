<?php
include("connection.php");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$query = $mysqli->prepare('select doctor_id,patient_id,appointment_date,status from appointments ');

if (!$query) {
    die("Query preparation failed: " . $mysqli->error);
}

if (!$query->execute()) {
    die("Query execution failed: " . $query->error);
}

$query->store_result();
$query->bind_result($doctor_id, $patient_id, $appointment_date,$status);

$response = [];
while ($query->fetch()) {
    $row = [
        'doctor_id' => $doctor_id,
        'patient_id' => $patient_id,
        'appointment_date' => $appointment_date,
        'status' => $status,
    ];
    $response[] = $row;
}

echo json_encode($response);