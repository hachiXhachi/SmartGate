<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $parentid = $_POST['id'];

    // Initialize an array to store results
    $results = [];

    $stmt1 = $con->prepare("SELECT * FROM childtv LEFT JOIN student_tbl ON student_tbl.studentid=childtv.student_id WHERE parent_id=:user_id");
    $stmt1->execute(['user_id' => $parentid]);

    foreach ($stmt1 as $row1) {
        $stmt2 = $con->prepare("SELECT * FROM attendance_tbl LEFT JOIN student_tbl ON student_tbl.studentid=attendance_tbl.student_id WHERE student_id=:user_id ORDER BY `date` DESC, `id` DESC, `time_in` DESC");
        $stmt2->execute(['user_id' => $row1['studentid']]);
        
        // Fetch the data from the statement result
        //$result = $stmt2->fetch(PDO::FETCH_ASSOC);

        // Append result to the array
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
