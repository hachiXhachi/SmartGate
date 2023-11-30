<?php
include 'includes/session.php';
$con = $pdo->open();

$sql = "INSERT INTO faculty_archive(name, email, password, department) SELECT name, email, password, department FROM faculty_tbl";
$stmt = $con->prepare($sql);
$stmt->execute($data);

$deleteTable = $con->prepare("DELETE FROM faculty_tbl");
$deleteTable->execute();
?>