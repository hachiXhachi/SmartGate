<?php
include 'includes/session.php';
$con = $pdo->open();


$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$name = $first_name . " " . $middle_name . " " . $last_name;
$email = $_POST['email'];
$password = "password";

$password = password_hash($password, PASSWORD_DEFAULT);

if ($user == null) {
    header("location:index.php");
}

$sql = "INSERT INTO faculty_tbl(name, email, password) VALUES (?, ?, ?)";
$data = array($name, $email, $password);

$stmt = $con->prepare($sql);
$stmt->execute($data);

header("location:admin_dashboard.php");
?>