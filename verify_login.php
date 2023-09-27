<?php
include 'includes/session.php';
$con = $pdo->open();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $con->prepare("SELECT *, COUNT(*) AS numrows FROM parent_tbl WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch();
if ($row['numrows'] > 0) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row['parentid'];
        header('location: parents_dashboard.php');
    } else {
        echo "<script>alert('Invalid email or password');
        window.location.href = 'login.php';
    </script>";
    }
} else {
    echo "<script>alert('Invalid email or password');
        window.location.href = 'login.php';
    </script>";
}

?>