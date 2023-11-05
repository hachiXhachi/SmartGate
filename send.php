<?php
include "./get_access_token.php";
function sendFCMNotification($access_token, $token) {
    $url = "https://fcm.googleapis.com/v1/projects/smartgate-17cc2/messages:send";
    $data = [
        'message' => [
            "data"=> [
                "title" => "Notification",
                "body" => "bimbimbambam",
                "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
                "image" => "https://images.unsplash.com/photo-1514473776127-61e2dc1dded3?w=871&q=80",
                "click_action" => "https://example.com"
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
"fjH-sj-fU_kJmntY7L7yYM:APA91bGK2EJgBnz0w9fxVnA7OKHp_DHQe5HvhMT3o-E9NUnBy9YuvJIX3AO4riH9PKFc7TNAumC-05N3mgwx97vMDF1Ei2tS_PAKrhMybyhnuaTlfesXyxtwvCDSpTx-B8qlgMU9G2tX"
];

foreach ($device_tokens as $token) {
    $response = sendFCMNotification($access_token, $token);
    echo $response . '<br>';
}