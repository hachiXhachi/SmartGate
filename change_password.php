<?php
include 'includes/session.php';
$con = $pdo->open();

$current_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$retype_pass = $_POST['retype_pass'];

$response = array();

if (password_verify($current_pass, $user['password'])) {
    if ($new_pass != $current_pass) {
        if ($new_pass == $retype_pass) {
            if ($_SESSION['mode'] == "parent") {
                $stmt = $con->prepare("UPDATE parent_tbl SET password=:password WHERE parentid=:parentid");
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $stmt->execute(['password' => $new_pass, 'parentid' => $user['parentid']]);
            } else if ($_SESSION['mode'] == "faculty") {
                $stmt = $con->prepare("UPDATE faculty_tbl SET password=:password WHERE id=:id");
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $stmt->execute(['password' => $new_pass, 'id' => $user['id']]);
            }

            $response['success'] = true;
            $response['message'] = 'Password successfully changed.';
        } else {
            $response['success'] = false;
            $response['message'] = 'New Password or Re-type Password doesn\'t match.';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Current Password and New Password should not be the same.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Incorrect current password.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>