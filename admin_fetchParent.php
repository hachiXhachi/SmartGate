<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $id = $_POST["id"];

    // Query the database to fetch student data based on the ID
    $sql = "SELECT * FROM parent_tbl WHERE parentid = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if data is retrieved successfully
    if ($result) {

        // Return data as JSON
        echo json_encode([
            'success' => true,
            'Name' => $result['name'],
            'email' => $result['email'],

        ]);
    } else {
        // Return an error message
        echo json_encode([
            'success' => false,
            'message' => 'Data not found'
        ]);
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request'
    ]);
}
?>
