<?php
include 'includes/session.php';
$con = $pdo->open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'error_message' => 'Please fill in both email and password fields']);
    } else {
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

        $stmt4 = $con->prepare("SELECT *, COUNT(*) AS numrows FROM security_tbl WHERE email = :email");
        $stmt4->bindParam(':email', $email);
        $stmt4->execute();
        $row4 = $stmt4->fetch();

        if ($row1['numrows'] > 0 && password_verify($password, $row1['password'])) {
            $_SESSION['user'] = $row1['parentid'];
            $_SESSION['mode'] = "parent";
            echo json_encode(['status' => 'success', 'mode' => 'parent']);
        } elseif ($row2['numrows'] > 0 && password_verify($password, $row2['password'])) {
            $_SESSION['user'] = $row2['id'];
            $_SESSION['mode'] = "admin";
            echo json_encode(['status' => 'success', 'mode' => 'admin']);
        } elseif ($row3['numrows'] > 0 && password_verify($password, $row3['password'])) {
            $_SESSION['user'] = $row3['id'];
            $_SESSION['mode'] = "faculty";
            echo json_encode(['status' => 'success', 'mode' => 'faculty']);
        } elseif ($row4['numrows'] > 0 && password_verify($password, $row4['password'])) {
            $_SESSION['user'] = $row4['id'];
            $_SESSION['mode'] = "security";
            echo json_encode(['status' => 'success', 'mode' => 'security']);
        } else {
            echo json_encode(['status' => 'error', 'error_message' => 'Invalid email or password']);
        }
    }
}
?>
