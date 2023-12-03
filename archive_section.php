<?php
include 'includes/session.php';
$con = $pdo->open();

$delete = $con->prepare("TRUNCATE TABLE section_archive");
$delete->execute();

$sql = "INSERT INTO section_archive(section_name, department_name, year_level) SELECT section_name, department_name, year_level FROM section_tbl";
$stmt = $con->prepare($sql);
$stmt->execute($data);

$deleteTable = $con->prepare("TRUNCATE TABLE section_tbl");
$deleteTable->execute();
?>