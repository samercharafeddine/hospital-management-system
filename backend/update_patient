<?php

include("connection.php");


try {
    $userIdToUpdate = $_POST["user_id"];
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $update_user_query = $mysqli->prepare("UPDATE patients SET username = ?, name = ?, Password = ? WHERE user_id = ?");
    $update_user_query->bind_param("ssisi", $username, $name, $password, $userIdToUpdate);
    $update_user_done = $update_user_query->execute();

    $userId = $mysqli->insert_id;
} catch (\Throwable $th) {
    throw $th;
}

if ($update_user_done && $update_doctor_done) {
    echo json_encode("User Updated successfully.");
} else {
    echo json_encode("Error Adding Doctor");
}