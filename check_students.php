<?php
include 'includes/session.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve studentNumbers from the AJAX request
    $studentNumbers = $_POST['studentNumbers'];

    // Use a prepared statement to prevent SQL injection
    $query = $con->prepare("SELECT * FROM student_tbl WHERE studentid IN (".implode(',', array_fill(0, count($studentNumbers), '?')).")");
    
    // Bind the parameters
    $query->execute($studentNumbers);

    // Fetch the results
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        // Return the student details
        echo json_encode(['status' => 'success', 'data' => $result]);
    } else {
        // Return an error message
        echo json_encode(['status' => 'error', 'message' => 'No matching records found']);
    }
} else {
    // Return an error if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
