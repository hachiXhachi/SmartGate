<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);

include 'includes/session.php';

// Assuming you are receiving the new name and student ID from the frontend
$newRfid = $_GET['rfid'];
$studentID = $_GET['studentID'];

$con = $pdo->open();

// Update the name in the database
$stmt = $con->prepare("UPDATE student_tbl SET rfidtag = :newRfid WHERE studentid = :studentID");
$stmt->execute(['newRfid' => $newRfid, 'studentID' => $studentID]);

// Close the database connection
$pdo->close();
?>
