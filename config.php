<?php
// Define your Firebase configuration here (loaded from environment variables or a secure location)
$firebaseConfig = [
    'apiKey' => "AIzaSyC5UYSZcnjJzBW70lKFRqeuL0l4MI7Dm9E",
    'authDomain' => "smartgate-17cc2.firebaseapp.com",
    'projectId' =>"smartgate-17cc2",
    'storageBucket' => "smartgate-17cc2.appspot.com",
   'messagingSenderId'=> "1071404311075",
    'appId' => "1:1071404311075:web:89131b3487f88a40ea8796",
    'measurementId'=> "G-VNQVH133NX",
    'vapidkey' => 'BCilzvG21GnHCqtw1AcrbXNo5GLvZ_8WVWvFkhQP7_QtsaXQDE9QGaARoKJ8TP7VnJoj3K2aLMoRKW1d8lipiSY'
];

header('Content-Type: application/json');
echo json_encode($firebaseConfig);
