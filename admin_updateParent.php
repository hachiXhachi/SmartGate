<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the AJAX request
    $id = $_POST["id"];
    $Name = $_POST["Name"];
    $email = $_POST["email"];
    $newStudentId = $_POST["newStudentId"];

    // Corrected SQL syntax for UPDATE statement
    $updateSql = "UPDATE parent_tbl SET name = ?, email = ? WHERE parentid = ?";
    $updateData = array($Name, $email, $id);

    $updateStmt = $con->prepare($updateSql);

    if ($updateStmt->execute($updateData)) {
        // Check if a new student ID is provided
        if (!empty($newStudentId)) {
            // Check if the new student ID exists in student_tbl
            if (studentIdExists($newStudentId, $con)) {
                // Insert the new student ID into childtv
                $insertSql = "INSERT INTO childtv(parent_id, student_id) VALUES (?, ?)";
                $insertData = array($id, $newStudentId);

                $insertStmt = $con->prepare($insertSql);
                $insertStmt->execute($insertData);
            }else{
                echo json_encode([
                    'status' => 'Error',
                    'data' => 'Student ID Dont Exist in the Database'
                ]);
            }
        }
        echo "\n";
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
            'message' => $updateStmt->errorInfo()[2] // Output the error message
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
    $sql = "SELECT * FROM parent_tbl WHERE parentid = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function studentIdExists($studentId, $con) {
    // Check if the student ID exists in student_tbl
    $sql = "SELECT COUNT(*) FROM student_tbl WHERE studentid = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$studentId]);
    $count = $stmt->fetchColumn();
    return $count > 0;
}
?>
