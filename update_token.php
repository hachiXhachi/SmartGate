<?php
include 'includes/session.php';

// Initialize your database connection or use your preferred method
$con = $pdo->open();

// Retrieve the user's ID from your session or other means
$userId = $_SESSION['user']; // Modify this based on your authentication system

// Get the new token from the client
$data = json_decode(file_get_contents('php://input'));
$newToken = $data->currentToken;

// Update the user's token in the database
$updateTokenQuery = "UPDATE parent_tbl SET player_id = :newToken WHERE parentid = :userId";
$statement = $con->prepare($updateTokenQuery);
$statement->bindParam(':newToken', $newToken);
$statement->bindParam(':userId', $userId);

if ($statement->execute()) {
    // Token updated successfully
    echo json_encode(['message' => 'Token updated']);
} else {
    // Handle the error
    echo json_encode(['message' => 'Failed to update token']);
}
