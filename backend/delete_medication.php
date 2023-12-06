<?php
include('connection.php');

$response = array();

if (isset($_POST['medication_id'])) {
    $user_id = $_POST['medication_id'];

    $delete_query = $mysqli->prepare('DELETE FROM medications WHERE id = ?');
    $delete_query->bind_param('s', $user_id);

    if ($delete_query->execute()) {
        $response['status'] = "success";
        $response['message'] = "Medication deleted successfully";
    } else {
        $response['status'] = "failed";
        $response['message'] = "Error deleting medication. Please try again later.";
    }
} else {
    $response['status'] = "failed";
    $response['message'] = "Incomplete POST data";
}

echo json_encode($response);
?>