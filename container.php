<?php
// Check if token is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    echo json_encode(["status" => "success", "token" => $token]);
    exit;
} else {
    echo json_encode(["status" => "error", "message" => "No POST data received"]);
    exit;
}
?>
