<?php
 include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the student ID from the POST data
    $studentId = $_POST['studentId'];

    // Use PDO to fetch attendance records for the given student ID
    $stmt = $con->prepare("SELECT date, time_in, time_out FROM attendance_tbl WHERE student_id = :studentId");
    $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the results as an associative array
    $attendanceRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($attendanceRecords);
} else {
    // Handle invalid request method
    http_response_code(400);
    echo 'Invalid request method';
}
?>
