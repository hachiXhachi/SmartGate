<?php
include 'includes/session.php';
$con = $pdo->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $name = $first_name . " " . $middle_name . " " . $last_name;
    $email = $_POST['email'];
    $password = "password"; // You might want to generate a secure password

    $children = $_POST['parent_studid'];
    $wordArray = explode(" ", $children);
    $myArray = $wordArray;

    $password = password_hash($password, PASSWORD_DEFAULT);

    // Your user authentication logic (if needed)

    $sql = "INSERT INTO parent_tbl(email, name, password) VALUES (?, ?, ?)";
    $data = array($email, $name, $password);

    $stmt = $con->prepare($sql);
    if ($stmt->execute($data)) {
        $lastInsertId = $con->lastInsertId(); // Get the last inserted parent ID

        // Insert child data
        foreach ($myArray as $item) {
            $sql = "INSERT INTO childtv(parent_id, student_id) VALUES (?, ?)";
            $data = array($lastInsertId, $item);

            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        }

        // Send a JSON success response to the client
        echo json_encode(array("success" => "Form submitted successfully"));
    } else {
        // Send a JSON error response to the client
        echo json_encode(array("error" => "Form submission failed"));
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode(array("error" => "Invalid request"));
}
?>
