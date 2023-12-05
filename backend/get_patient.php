<?php
include("connection.php");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$query = $mysqli->prepare('select user_id,name,medical_history from doctors ');

if (!$query) {
    die("Query preparation failed: " . $mysqli->error);
}

if (!$query->execute()) {
    die("Query execution failed: " . $query->error);
}

$query->store_result();
$query->bind_result($user_id, $name, $medical_history);

$response = [];
while ($query->fetch()) {
    $row = [
        'user_id' => $user_id,
        'name' => $name,
        'medical_history' => $medical_history,
    ];
    $response[] = $row;
}

echo json_encode($response);