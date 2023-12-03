<?php
include 'includes/session.php';
$con = $pdo->open();

$sql = "INSERT INTO student_archive(studentid, name, sectionid, department, schoolemail, rfidtag, year_level) SELECT studentid, name, sectionid, department, schoolemail, rfidtag, year_level FROM student_tbl";
$stmt = $con->prepare($sql);
$stmt->execute($data);

$deleteTable = $con->prepare("DELETE FROM student_tbl");
$deleteTable->execute();

$delete = $con->prepare("DELETE FROM attendance_tbl");
$delete->execute();
?>