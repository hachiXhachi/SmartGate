<?php
include 'includes/session.php';
$stmt = $con->prepare("SELECT section_name FROM section_tbl");
$stmt->execute();

$data = array();

while ($row = $stmt->fetch()) {
    $data[] = array('value' => $row['section_name']);
}

header('Content-Type: application/json');
echo json_encode($data);


?>