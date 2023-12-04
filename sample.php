<?php
include 'includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href='cssCodes/main.css'>

    <!-- Add this script to your HTML file -->
    <script>
        function updateToken(token) {
            // Display the token in a <p> tag with id 'result'
            document.getElementById('result').innerText = 'Token: ' + token;
        }
    </script>
</head>

<body>
    <!-- Add this to your HTML file where you want to display the result -->
    <p id="result">qwe</p>
</body>

</html>
