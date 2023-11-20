<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $parentid = $_POST['id'];

    // Initialize an array to store results
    $results = [];

    $stmt1 = $con->prepare("SELECT * FROM childtv LEFT JOIN student_tbl ON student_tbl.studentid=childtv.student_id WHERE parent_id=:user_id");
    $stmt1->execute(['user_id' => $parentid]);
    $studentIDs = []; // Initialize an array to store student IDs

    // Fetch all rows and collect student IDs
    foreach ($stmt1 as $row1) {
        $studentIDs[] = $row1['studentid'];
    }

    if (!empty($studentIDs)) {
        // Create placeholders for the IN clause
        $placeholders = implode(',', array_fill(0, count($studentIDs), '?'));

        // Prepare the second statement using the placeholders
        $stmt2 = $con->prepare("SELECT * FROM attendance_tbl LEFT JOIN student_tbl ON attendance_tbl.student_id=student_tbl.studentid WHERE student_id IN ($placeholders) ORDER BY id DESC");

        // Bind parameters and execute the second statement
        $stmt2->execute($studentIDs);
        $results[] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }

    // Echo the JSON after the loop
    echo json_encode([
        'success' => true,
        'data' => $results,
    ]);
} else {
    // Handle cases where the request is not a POST request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request',
    ]);
}
?>