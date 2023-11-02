<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Receive the RFID code from the NodeMCU
//     $rfidCode = isset($_POST['UIDresult']) ? $_POST['UIDresult'] : '';

//     // Perform a check to see if the RFID code is in the database
//     if ($rfidCode === '13828005') {
//         // If it's a match, send back a "1" response
//         echo '1';
//     } else {
//         // If it's not a match, send back a "0" response
//         echo '0';
//     }
// } else {
//     // Handle other HTTP request methods if needed
//     http_response_code(405); // Method Not Allowed
// }

// 	file_put_contents('UIDContainer.php',$Write);

include 'includes/session.php';
$con = $pdo->open();
$codeGranted = '';
$studentData = array();

// Receive the RFID code from the NodeMCU
$rfidCode = isset($_POST['UIDresult']) ? $_POST['UIDresult'] : '';
date_default_timezone_set('Singapore');
$timeToday = date("g:i A");
$dateToday = date("n-j-Y"); 
$stmt = $con->prepare("SELECT *, COUNT(*) AS numrows FROM student_tbl WHERE rfidtag = :rfidtag");
$stmt->bindParam(':rfidtag', $rfidCode);
$stmt->execute();
$row = $stmt->fetch();
$sql = "INSERT INTO attendance_tbl(student_id, date, time_in) VALUES (?, ?, ?)";
$data = array($row['studentid'], $dateToday, $timeToday);
if ($row['numrows'] > 0) {
    echo '1';
    $studentData = array(
        'studentid' => isset($row['studentid']) ? $row['studentid'] : '',
        'name' => isset($row['name']) ? $row['name'] : '',
        'sectionid' => isset($row['sectionid']) ? $row['sectionid'] : '',
        'department' => isset($row['department']) ? $row['department'] : '',
    );
    //TRIGGER NOTIF HERE 
    //pag nag login ung user kailangan iaccept nya ung notif confirmation para magka user_id 
    // Encode the array as JSON
    $jsonData = json_encode($studentData);
    
    // Create the content for 'security_dashboard.php'
    $phpContent = $jsonData;
    
    // Write the content to 'security_dashboard.php'
    file_put_contents('getstudentData.php', $phpContent);
    
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
}
else{
     echo '0';
     $studentData = array(
        'studentid' =>"Not Exist" ,
        'name' =>"Not Exist",
        'sectionid' => "Not Exist",
        'department' => "Not Exist",
    
    );
    $jsonData = json_encode($studentData);
    
    // Create the content for 'security_dashboard.php'
    $phpContent = $jsonData;
    
    // Write the content to 'security_dashboard.php'
    file_put_contents('getstudentData.php', $phpContent);
}


?>