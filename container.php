<?php
// Disable caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");

$token = $_POST["token"];

// Generate a unique identifier (timestamp in this case)


// Append the cache buster to the file name


$Write = "<?php header(\"Cache-Control: no-cache, no-store, must-revalidate\"); header(\"Pragma: no-cache\"); header(\"Expires: 0\"); \$token='" . $token . "'; ?>";

// Write to the file with the cache buster in the name
file_put_contents('mobileTokenContainer.php',$Write);

flush();


?>