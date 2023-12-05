<?php

include("connection.php");


try {
    $userIdToUpdate = $_POST["user_id"];
    $username = $_POST["username"];
    $name = $_POST["name"];
    $spec = $_POST["specialization"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $update_user_query = $mysqli->prepare("UPDATE doctors SET username = ?, name = ?, Password = ? WHERE user_id = ?");
    $update_user_query->bind_param("ssisi", $username, $name, $password, $userIdToUpdate);
    $update_user_done = $update_user_query->execute();

    $userId = $mysqli->insert_id;

    $update_doctor_query = $mysqli->prepare("UPDATE doctors SET Specialization = ? WHERE UserID = ?");
    $update_doctor_query->bind_param("si", $spec, $userIdToUpdate);
    $update_doctor_done = $update_doctor_query->execute();
} catch (\Throwable $th) {
    throw $th;
}

if ($update_user_done && $update_doctor_done) {
    echo json_encode("User Updated successfully.");
} else {
    echo json_encode("Error Adding Doctor");
}