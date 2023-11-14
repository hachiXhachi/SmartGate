<?php
include 'includes/session.php';
$con = $pdo->open();

$rfidCode = isset($_POST['UIDresult']) ? $_POST['UIDresult'] : '';
date_default_timezone_set('Singapore');
$timeToday = date("g:i A");
$dateToday = date("n-j-Y");
$stmt = $con->prepare("SELECT *, COUNT(*) AS numrows FROM student_tbl WHERE rfidtag = :rfidtag");
$stmt->bindParam(':rfidtag', $rfidCode);
$stmt->execute();
$row = $stmt->fetch();
if ($row['numrows'] > 0) {
    echo '1';

    $query1 = $con->prepare("SELECT * FROM `attendance_tbl` WHERE `date` = '$dateToday' AND `student_id` = '$row[studentid]' ORDER BY `date` DESC, `time_in` DESC, `id` DESC LIMIT 1");
    $query1->execute();
    $result = $query1->fetch();
    if ($result['time_out'] == '') {
        $sql = "UPDATE attendance_tbl 
        SET `time_out` = '$timeToday' 
        WHERE `time_in` != '' AND `time_out` = '' AND `student_id` = '$row[studentid]' 
        ORDER BY `date` DESC, `time_in` DESC, `id` DESC LIMIT 1";

        $con->query($sql);
    } else {
        $sql2 = $con->prepare("INSERT INTO attendance_tbl(student_id, date, time_out) VALUES (?, ?, ?)");
        $data = array($row['studentid'], $dateToday, $timeToday);
        $sql2->execute($data);
    }

} else {
    echo '0';
}

?>