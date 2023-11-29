<?php
include 'includes/session.php';
$stmt = $con->prepare("SELECT * FROM faculty_tbl LEFT JOIN section_tbl ON faculty_tbl.department=section_tbl.department_name");
$stmt->execute();

$data = array();

while ($row = $stmt->fetch()) {
    $data[] = array('value' => $row['section_name']);
}

header('Content-Type: application/json');
echo json_encode($data);


?>