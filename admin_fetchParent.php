<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $id = $_POST["id"];

    // Query the database to fetch parent data based on the ID
    $parentSql = "SELECT * FROM parent_tbl WHERE parentid = ?";
    $parentStmt = $con->prepare($parentSql);
    $parentStmt->execute([$id]);
    $parentResult = $parentStmt->fetch(PDO::FETCH_ASSOC);

    // Query the database to fetch all child data based on the parentid
    $childSql = "SELECT student_id FROM childtv WHERE parent_id = ?";
    $childStmt = $con->prepare($childSql);
    $childStmt->execute([$id]);
    $childResult = $childStmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if parent data is retrieved successfully
    if ($parentResult) {
        // Extract only the studentid values from the child data
        $studentIds = array_column($childResult, 'student_id');

        // Return data as JSON
        echo json_encode([
            'success' => true,
            'Name' => $parentResult['name'],
            'email' => $parentResult['email'],
            'studentIds' => $studentIds, // Include only studentid values in the response
        ]);
    } else {
        // Return an error message
        echo json_encode([
            'success' => false,
            'message' => 'Parent data not found',
        ]);
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request',
    ]);
}
?>
