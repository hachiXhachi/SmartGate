<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);

include 'includes/session.php';

// Assuming you are receiving the new name and student ID from the frontend
$newRfid = $_GET['rfid'];
$studentID = $_GET['studentID'];

$con = $pdo->open();

// Check if the rfidtag already exists in the database
$checkStmt = $con->prepare("SELECT COUNT(*) FROM student_tbl WHERE rfidtag = :rfidtag");
$checkStmt->execute(['rfidtag' => $newRfid]);
$tagCount = $checkStmt->fetchColumn();

if ($tagCount == 0) {
    // The rfidtag doesn't exist, so proceed with the update
    $updateStmt = $con->prepare("UPDATE student_tbl SET rfidtag = :newRfid WHERE studentid = :studentID");
    $updateStmt->execute(['newRfid' => $newRfid, 'studentID' => $studentID]);
    echo "RFID tag updated successfully!";
} else {
    // The rfidtag already exists, handle this case as needed
    echo "RFID tag already exists in the database!";
}


// Close the database connection
$pdo->close();
?>
