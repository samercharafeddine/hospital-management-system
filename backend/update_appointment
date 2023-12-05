<?php

include("connection.php");


try {
    $appointmentDateToChange = $_POST["user_id"];

    $update_user_query = $mysqli->prepare("UPDATE appointments SET appointment_date = ? WHERE appointment_id = ?");
    $update_user_query->bind_param("ssisi", $appointmentDateToChange);
    $update_user_done = $update_user_query->execute();

    $userId = $mysqli->insert_id;
} catch (\Throwable $th) {
    throw $th;
}

if ($update_user_done && $update_doctor_done) {
    echo json_encode("appointment Updated successfully.");
} else {
    echo json_encode("Error Adding Doctor");
}