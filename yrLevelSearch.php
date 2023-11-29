<?php
include 'includes/session.php';
$stmt = $con->prepare("SELECT year_level FROM section_tbl");
$stmt->execute();

$data = array();

while ($row = $stmt->fetch()) {
    $data[] = array('value' => $row['year_level']);
}

header('Content-Type: application/json');
echo json_encode($data);


?>