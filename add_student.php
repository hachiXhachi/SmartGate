<?php
	include 'includes/connection.php';
	$con = $pdo->open();

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['confirmpassword'];

	$sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
	$data = array($name, $email, $password);

	$stmt=$con->prepare($sql);
	$stmt->execute($data);
	header("location:index.php");
?>