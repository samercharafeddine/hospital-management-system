<?php
include('connection.php');

$response = array();

if (isset($_POST['medical_record_id'])) {
    $user_id = $_POST['medical_record_id'];

    $delete_query = $mysqli->prepare('DELETE FROM medical_records WHERE id = ?');
    $delete_query->bind_param('s', $user_id);

    if ($delete_query->execute()) {
        $response['status'] = "success";
        $response['message'] = "Medical record deleted successfully";
    } else {
        $response['status'] = "failed";
        $response['message'] = "Error deleting medical record. Please try again later.";
    }
} else {
    $response['status'] = "failed";
    $response['message'] = "Incomplete POST data";
}

echo json_encode($response);
?>