<?php
include 'includes/session.php';
$con = $pdo->open();
if ($_SESSION['mode'] == "parent") {
    $parentID = $_SESSION['user'];
    $query = $con->prepare("UPDATE `parent_tbl` SET `player_id`='' WHERE `parentid` = '$parentID'");
    $query->execute();
    foreach ($query as $row) {
        $player_id = '';
    }
}
session_destroy();

header('location: index.php');
?>