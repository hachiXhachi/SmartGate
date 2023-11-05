<?php
include 'includes/session.php';
$con = $pdo->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['email'], $_POST['parent_studid'])) {
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $name = $first_name . " " . $middle_name . " " . $last_name;
        $email = $_POST['email'];
        $password = "password"; // You might want to generate a secure password

        $children = $_POST['parent_studid'];
        $myArray = json_decode($children); // Decode the JSON array

        $password = password_hash($password, PASSWORD_DEFAULT);

        $success = true; // Flag to track success

        // Verify if all student IDs exist in student_tbl
        foreach ($myArray as $item) {
            $verify_sql = "SELECT * FROM student_tbl WHERE studentid = ?";
            $verify_stmt = $con->prepare($verify_sql);
            $verify_stmt->execute([$item]);
            $row = $verify_stmt->fetch();

            if (!$row) {
                // Student ID doesn't exist, set the success flag to false
                $success = false;
                break; // Exit the loop if any student ID is invalid
            }
        }

        if ($success) {
            // If all student IDs are valid, insert data into parent_tbl
            $sql = "INSERT INTO parent_tbl(email, name, password) VALUES (?, ?, ?)";
            $data = array($email, $name, $password);

            $stmt = $con->prepare($sql);
            if ($stmt->execute($data)) {
                $lastInsertId = $con->lastInsertId(); // Get the ID of the newly inserted parent

                foreach ($myArray as $item) {
                    // Insert data into childtv
                    $child_sql = "INSERT INTO childtv(parent_id, student_id) VALUES (?, ?)";
                    $child_data = array($lastInsertId, $item);

                    $child_stmt = $con->prepare($child_sql);
                    $child_stmt->execute($child_data);
                }

                echo json_encode(array("success" => "Form submitted successfully"));
            } else {
                echo json_encode(array("error" => "Form submission failed"));
            }
        } else {
            // If any verification failed, return an error message
            echo json_encode(array("error" => "Some student IDs do not exist in student_tbl"));
        }
    } else {
        // Handle cases where the required POST data is missing
        echo json_encode(array("error" => "Required data missing"));
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode(array("error" => "Invalid request"));
}
?>
