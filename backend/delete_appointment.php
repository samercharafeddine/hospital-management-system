<?php
include('connection.php');

$response = array(); 

if (isset($_POST['appointment_id'])) {
    $user_id = $_POST['appointment_id'];

    $delete_query = $mysqli->prepare('DELETE FROM appointments WHERE id = ?');
    $delete_query->bind_param('s', $user_id);

    if ($delete_query->execute()) {
        $response['status'] = "success";
        $response['message'] = "Appointment deleted successfully";
    } else {
        $response['status'] = "failed";
        $response['message'] = "Error deleting appointment. Please try again later.";
    }
} else {
    $response['status'] = "failed";
    $response['message'] = "Incomplete POST data";
}

echo json_encode($response);
?>