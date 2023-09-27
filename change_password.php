<?php
include 'includes/session.php';
$con = $pdo->open();


$current_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$retype_pass = $_POST['retype_pass'];

if (password_verify($current_pass, $user['password'])) {
    if ($new_pass != $current_pass) {
        if ($new_pass == $retype_pass) {
            $stmt = $con->prepare("UPDATE parent_tbl SET password=:password WHERE parentid=:parentid");
            $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $stmt->execute(['password' => $new_pass, 'parentid' => $user['parentid']]);

            echo "<script>alert('Password successfully changed.')</script>";

            header("location:parents_dashboard.php");
        } else {
            echo "<script>alert('Password doesnt match.'); window.location.href = 'parents_dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Current Password and New Password should not be same.'); window.location.href = 'parents_dashboard.php';</script>";
    }
} else {
    echo "<script>alert('Invalid Current Password'); window.location.href = 'parents_dashboard.php';</script>";
}
?>