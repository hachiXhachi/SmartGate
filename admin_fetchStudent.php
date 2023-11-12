<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $id = $_POST["id"];

    // Query the database to fetch student data based on the ID
    $sql = "SELECT * FROM student_tbl WHERE studentid = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if data is retrieved successfully
    if ($result) {
        // Split the concatenated name into separate components
        $fullName = $result['name'];
        $nameComponents = explode(' ', $fullName);

        // Return data as JSON
        echo json_encode([
            'success' => true,
            'firstName' => isset($nameComponents[0]) ? $nameComponents[0] : '',
            'middleName' => isset($nameComponents[1]) ? $nameComponents[1] : '',
            'lastName' => isset($nameComponents[2]) ? $nameComponents[2] : '',
            'studentId' => $result['studentid'],
            'section' => $result['sectionid'],
            'email' => $result['schoolemail'],
            'rfidTag' => $result['rfidtag'],
            'department' => $result['department']
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
