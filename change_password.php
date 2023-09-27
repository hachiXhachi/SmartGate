<?php
include 'includes/session.php';
$con = $pdo->open();


$current_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$retype_pass = $_POST['retype_pass'];

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

header("location:parent_dashboard.php");
?>