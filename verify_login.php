<?php
include 'includes/session.php';
$con = $pdo->open();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $con->prepare("SELECT * FROM parent_tbl WHERE email=:email AND password = :password");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$row = $stmt->fetch();

if ($stmt->rowCount() > 0) {
    $_SESSION['user'] = $row['parentid'];
    header('location: parents_dashboard.php');
} 
else {
    echo "
    <script>
        alert('Invalid email or password');
        window.location.href = 'login.php';
    </script>";
}

?>