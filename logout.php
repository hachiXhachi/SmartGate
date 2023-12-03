<?php
include 'includes/session.php';
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$con = $pdo->open();
if ($_SESSION['mode'] == "parent") {
    $parentID = $_SESSION['user'];
    $query = $con->prepare("UPDATE `parent_tbl` SET `player_id`='' WHERE `parentid` = '$parentID'");
    $query->execute();
    foreach ($query as $row) {
        $player_id = '';
    }
$Write = "<?php $" . "token=''; " . "echo $" . "token;" . " ?>";
file_put_contents('mobileTokenContainer.php',$Write);
}
session_destroy();

header('location: index.php');
?>