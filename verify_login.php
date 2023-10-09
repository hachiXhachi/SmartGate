<?php
include 'includes/session.php';
$con = $pdo->open();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt1 = $con->prepare("SELECT *, COUNT(*) AS numrows FROM parent_tbl WHERE email = :email");
$stmt1->bindParam(':email', $email);
$stmt1->execute();
$row1 = $stmt1->fetch();

$stmt2 = $con->prepare("SELECT *, COUNT(*) AS numrows FROM admin_tbl WHERE email = :email");
$stmt2->bindParam(':email', $email);
$stmt2->execute();
$row2 = $stmt2->fetch();

$stmt3 = $con->prepare("SELECT *, COUNT(*) AS numrows FROM faculty_tbl WHERE email = :email");
$stmt3->bindParam(':email', $email);
$stmt3->execute();
$row3 = $stmt3->fetch();

if ($row1['numrows'] > 0) {
    if (password_verify($password, $row1['password'])) {
        $_SESSION['user'] = $row1['parentid'];
        $_SESSION['mode'] = "parent";
        header('location: parents_dashboard.php');
    } else {
        echo "<script>alert('Invalid email or password');
        window.location.href = 'index.php';
    </script>";
    }
} else if ($row2['numrows'] > 0) {
    if (password_verify($password, $row2['password'])) {
        $_SESSION['user'] = $row2['id'];
        $_SESSION['mode'] = "admin";
        header('location: admin_dashboard.php');
    } else {
        echo "<script>alert('Invalid email or password');
        window.location.href = 'index.php';
    </script>";
    }
} else if ($row3['numrows'] > 0) {
    if (password_verify($password, $row3['password'])) {
        $_SESSION['user'] = $row3['id'];
        $_SESSION['mode'] = "faculty";
        header('location: faculty_dashboard.php');
    } else {
        echo "<script>alert('Invalid email or password');
        window.location.href = 'index.php';
    </script>";
    }
} else {
    echo "<script>alert('Invalid email or password');
        window.location.href = 'index.php';
    </script>";
}

?>