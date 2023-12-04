<?php
// updatetoken.php
include 'includes/session.php';

// Check if the request is an Ajax request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && isset($_POST['userId'])) {
    $token = $_POST['token'];
    $userId = $_POST['userId'];

    // Update the token in the database
    $updateTokenQuery = "UPDATE parent_tbl SET player_id = :newToken WHERE parentid = :userId";
    $statement = $con->prepare($updateTokenQuery);
    $statement->bindParam(':newToken', $token);
    $statement->bindParam(':userId', $userId);

    // Execute the update
    if ($statement->execute()) {
        echo json_encode(['success' => true, 'message' => 'Token updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating token']);
    }
} else {
    // Handle non-Ajax requests or missing token
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

?>
