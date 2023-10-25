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

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO faculty_tbl(name, email, password) VALUES (?, ?, ?)";
    $data = array($name, $email, $password);

    $stmt = $con->prepare($sql);
    if ($stmt->execute($data)) {
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
