<?php
include "./get_access_token.php";
include 'includes/session.php';
$con = $pdo->open();

$studentName = '';
$rfidCode = isset($_POST['UIDresult']) ? $_POST['UIDresult'] : '';
date_default_timezone_set('Singapore');
$timeToday = date("g:i A");
$dateToday = date("n-j-Y");
$stmt = $con->prepare("SELECT *, COUNT(*) AS numrows FROM student_tbl WHERE rfidtag = :rfidtag");
$stmt->bindParam(':rfidtag', $rfidCode);
$stmt->execute();
$row = $stmt->fetch();
if ($row['numrows'] > 0) {
    $studentName = $row['name'];
    echo '1';
    $query1 = $con->prepare("SELECT * FROM `attendance_tbl` WHERE `date` = '$dateToday' AND `student_id` = '$row[studentid]' ORDER BY `date` DESC, `id` DESC LIMIT 1");
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
    $player_id = '';
    $query = $con->prepare("SELECT * FROM childtv LEFT JOIN parent_tbl ON childtv.parent_id=parent_tbl.parentid WHERE student_id=:student");
    $query->execute(['student' => $row['studentid']]);
    foreach ($query as $row) {
        $player_id = $row['player_id'];
    }
    $access_token = get_access_token("smartgate-17cc2-firebase-adminsdk-dkaqq-c2cb55ff77.json");
    $device_tokens = $player_id;
    $response = sendFCMNotification($access_token, $device_tokens, $studentName);
    
} else {
    echo '0';
}
function sendFCMNotification($access_token, $token, $studentName)
{
    $timeToday = date("g:i A");
    $url = "https://fcm.googleapis.com/v1/projects/smartgate-17cc2/messages:send";
    $data = [
        'message' => [
            "data" => [
                "title" => "Notification",
                "body" => "Your child ".$studentName." exits the school premises at ".$timeToday,
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