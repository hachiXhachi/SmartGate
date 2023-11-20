<?php
include "./get_access_token.php";
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
    $jsonData = json_encode($studentData);
    $phpContent = $jsonData;

    // Write the content to 'security_dashboard.php'
    file_put_contents('getstudentData.php', $phpContent);
    $player_id = '';
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    
    $query = $con->prepare("SELECT * FROM childtv LEFT JOIN parent_tbl ON childtv.parent_id=parent_tbl.parentid WHERE student_id=:student");
    $query->execute(['student' => $row['studentid']]);
    foreach ($query as $row) {
        $player_id = $row['player_id'];
    }
    $access_token = get_access_token("smartgate-17cc2-firebase-adminsdk-dkaqq-c2cb55ff77.json");
    $device_tokens = $player_id;
    $response = sendFCMNotification($access_token, $device_tokens);
    
    
} else {
    echo '0';
    $studentData = array(
        'studentid' => "Not Exist",
        'name' => "Not Exist",
        'sectionid' => "Not Exist",
        'department' => "Not Exist",

    );
    $jsonData = json_encode($studentData);

    // Create the content for 'security_dashboard.php'
    $phpContent = $jsonData;

    // Write the content to 'security_dashboard.php'
    file_put_contents('getstudentData.php', $phpContent);
}

function sendFCMNotification($access_token, $token)
{
    $timeToday = date("g:i A");
    $url = "https://fcm.googleapis.com/v1/projects/smartgate-17cc2/messages:send";
    $data = [
        'message' => [
            "data" => [
                "title" => "Notification",
                "body" => "".$timeToday,
                "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
                "image" => "assets/bulsu_icon.png",
                "click_action" => "https://smartgatebulsusc-001-site1.etempurl.com/index.php"
            ],
            'token' => $token
        ]
    ];
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $access_token,
            "Content-Type: application/json",
        ),
        CURLOPT_POSTFIELDS => json_encode($data),
    );
    $curl = curl_init();
    curl_setopt_array($curl, $options);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
?>