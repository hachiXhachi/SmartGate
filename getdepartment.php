<?php
include 'includes/session.php';

$selectedValue = $_POST["selectedValue"];

$stmt = $con->prepare("SELECT department_name, year_level FROM section_tbl WHERE section_name=:sectiondrop");
$stmt->bindParam(':sectiondrop', $selectedValue);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Create an associative array to hold both department and year level
$response = array(
    'department' => $row['department_name'],
    'year_level' => $row['year_level']
);

// Encode the array as JSON and echo the result
echo json_encode($response);
?>
