<?php
include 'includes/session.php';

$con = $pdo->open();
$stmt = $con->prepare("SELECT * FROM student_tbl");
$stmt->execute();

$data = array(); // Array to store the data

foreach ($stmt as $row) {
    $data[] = array(
        'ID' => $row["studentid"],
        'Name' => $row["name"],
        'Email' => $row["schoolemail"],
        'rfid'=>$row['rfidtag']
    );
}

// Convert the data array to a JSON string
echo json_encode($data);
?>