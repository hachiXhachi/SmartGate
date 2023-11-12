<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $id = $_POST["id"];

    // Perform the delete operation
    $sql = "DELETE FROM student_tbl WHERE studentid = ?";
    $stmt = $con->prepare($sql);

    if ($stmt->execute([$id])) {
        // Send a JSON success response to the client
        echo json_encode([
            'status' => 'Success'
        ]);
    } else {
        // Send a JSON error response to the client
        echo json_encode([
            'status' => 'Error',
            'message' => $stmt->errorInfo()[2] // Output the error message
        ]);
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode([
        'status' => 'Invalid'
    ]);
}
?>
