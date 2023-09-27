<?php
include 'includes/session.php';
$con = $pdo->open();


$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$name = $first_name . " " . $middle_name . " " . $last_name;
$email = $_POST['email'];
$password = "password";
$children = $_POST['children'];
$wordArray = explode(" ", $children);
$myArray = $wordArray;

$password = password_hash($password, PASSWORD_DEFAULT);

if ($user == null) {
    header("location:login.php");
}

$sql = "INSERT INTO parent_tbl(email, name, password) VALUES (?, ?, ?)";
$data = array($email, $name, $password);

$stmt = $con->prepare($sql);
$stmt->execute($data);

$stmt = $con->prepare("SELECT * FROM parent_tbl WHERE email=:email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch();

foreach ($myArray as $item) {
    $sql = "INSERT INTO childtv(parent_id, student_id) VALUES (?, ?)";
    $data = array($row['parentid'], $item);

    $stmt = $con->prepare($sql);
    $stmt->execute($data);
}

header("location:admin_dashboard.php");
?>