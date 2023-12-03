<?php
include 'includes/session.php';
$con = $pdo->open();

$sql = "INSERT INTO parent_archive(email, name, password) SELECT email, name, password FROM parent_tbl";
$stmt = $con->prepare($sql);
$stmt->execute($data);

$deleteTable = $con->prepare("DELETE FROM parent_tbl");
$deleteTable->execute();

$delete = $con->prepare("DELETE FROM childtv");
$delete->execute();
?>