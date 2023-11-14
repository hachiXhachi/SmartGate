<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the studentId from the AJAX request
    $studentId = $_POST["studentId"];

    // Prepare the SQL statement to delete the row in childtv
    $deleteSql = "DELETE FROM childtv WHERE student_id = ?";
    $deleteStmt = $con->prepare($deleteSql);

    // Bind the parameter and execute the statement
    $deleteStmt->execute([$studentId]);

    // Check if the deletion was successful
    if ($deleteStmt->rowCount() > 0) {
        // Send a JSON success response to the client
        echo json_encode([
            'status' => 'Success',
            'message' => 'Row deleted successfully'
        ]);
    } else {
        // Send a JSON error response to the client
        echo json_encode([
            'status' => 'Error',
            'message' => 'Error deleting row'
        ]);
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode([
        'status' => 'Invalid',
        'message' => 'Invalid request'
    ]);
}
?>
