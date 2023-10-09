<?php
include 'includes/connection.php';
session_start();

if (isset($_SESSION['user'])) {
	$con = $pdo->open();

	try {
		if ($_SESSION['mode'] == "parent") {
			$stmt = $con->prepare("SELECT * FROM parent_tbl WHERE parentid=:parentid");
			$stmt->execute(['parentid' => $_SESSION['user']]);
			$user = $stmt->fetch();
		} else if ($_SESSION['mode'] == "faculty") {
			$stmt = $con->prepare("SELECT * FROM faculty_tbl WHERE id=:id");
			$stmt->execute(['id' => $_SESSION['user']]);
			$user = $stmt->fetch();
		}
	} catch (PDOException $e) {
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();
}
?>