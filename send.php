<?php
include "./get_access_token.php";
function sendFCMNotification($access_token, $token) {
    $url = "https://fcm.googleapis.com/v1/projects/smartgate-17cc2/messages:send";
    $data = [
        'message' => [
            "data" => [
                "title" => "Notification",
                "body" => "bimbim",
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

$access_token = get_access_token("smartgate-17cc2-firebase-adminsdk-dkaqq-c2cb55ff77.json");
$device_tokens = [
"eV-jM3OkS1o-1tkr9Dh8Fu:APA91bEN5qqTLwfqIaYu7FQvelsFzisjpya5yOJv6OwoFThIpyNzvBLtcfGh8MzJFi7_pwZlPFw7zo7uAb_S-DhBb__m58YAMp47AFXC6aer8UG-188uyJAdTbN8IUpN6maPj6gcpHoy"

];

foreach ($device_tokens as $token) {
    $response = sendFCMNotification($access_token, $token);
    echo $response . '<br>';
}