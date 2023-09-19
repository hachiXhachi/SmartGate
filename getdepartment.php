<?php
include 'includes/session.php';
$selectedValue = $_POST["selectedValue"];
$stmt = $con->prepare("SELECT department_name from section_tbl where section_name=:sectiondrop");
$stmt->bindParam(':sectiondrop', $selectedValue);
$stmt->execute();
$row = $stmt->fetch();
echo $row['department_name'];