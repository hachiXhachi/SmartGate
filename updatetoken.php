<?php
include 'includes/session.php';

include 'mobileTokenContainer.php';
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$userId = $_SESSION['user'];
$updateTokenQuery = "UPDATE parent_tbl SET player_id = :newToken WHERE parentid = :userId";
$statement = $con->prepare($updateTokenQuery);
$statement->bindParam(':newToken', $token);
$statement->bindParam(':userId', $userId);
$statement->execute();

echo "Token updated successfully";
?>