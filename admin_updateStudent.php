<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the AJAX request
    $id = $_POST["id"];
    $Name = $_POST["Name"];
    $studentId = $_POST["studentId"];
    $section = $_POST["section"];
    $email = $_POST["email"];
    $rfidTag = $_POST["rfidTag"];
    $department = $_POST["department"];
    $year_lvl = $_POST["yrlvl"];

    // Corrected SQL syntax for UPDATE statement
    $sql = "UPDATE student_tbl SET name = ?, sectionid = ?, department = ?, schoolemail = ?, rfidtag = ?, year_level =? WHERE studentid = ?";
    $data = array($Name, $section, $department, $email, $rfidTag, $year_lvl, $studentId);

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
    $sql = "SELECT * FROM student_tbl WHERE studentid = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
