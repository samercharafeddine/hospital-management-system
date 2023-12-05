<?php
include("connection.php");
include("./backend/jwt_token.php");

$token_validation = Verify($headers["Authorization"], '123' );


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$query = $mysqli->prepare('select room_id,patient_id,doctor_id,room_number from rooms ');

if (!$query) {
    die("Query preparation failed: " . $mysqli->error);
}

if (!$query->execute()) {
    die("Query execution failed: " . $query->error);
}

$query->store_result();
$query->bind_result($room_id, $patient_id, $doctor_id,$room_number);

$response = [];
while ($query->fetch()) {
    $row = [
        'room_id' => $room_id,
        'patient_id' => $patient_id,
        'doctor_id' => $doctor_id,
        'room_number'=> $room_number
    ];
    $response[] = $row;
}

echo json_encode($response);