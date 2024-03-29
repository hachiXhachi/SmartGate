<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the AJAX request
    $id = $_POST["id"];
    $Name = $_POST["Name"];
    $email = $_POST["email"];


    // Corrected SQL syntax for UPDATE statement
    $sql = "UPDATE faculty_tbl SET name = ?, email = ? WHERE id = ?";
    $data = array($Name, $email, $id);

    $stmt = $con->prepare($sql);

    if ($stmt->execute($data)) {
        // Fetch the updated data
        $updatedData = fetchStudentData($id, $con);

        // Send a JSON success response to the client with the updated data
        echo json_encode([
            'status' => 'Success',
            'data' => $updatedData
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

function fetchStudentData($id, $con) {
    // Query the database to fetch student data based on the ID
    $sql = "SELECT * FROM faculty_tbl WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
