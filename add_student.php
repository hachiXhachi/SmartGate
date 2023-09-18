<?php
	include 'includes/connection.php';
	$con = $pdo->open();
	
	$studentid = $_POST['studentid'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$name = $first_name." ".$middle_name." ".$last_name;
	$sectionid = $_POST['sectionid'];
	$department = $_POST['department'];
	$schoolemail = $_POST['schoolemail'];
	$rfidtag = $_POST['rfidtag'];

	$sql = "INSERT INTO student_tbl(studentid, name, sectionid, department, schoolemail, rfidtag) VALUES (?, ?, ?, ?, ?, ?)";
	$data = array($studentid, $name, $sectionid, $department, $schoolemail, $rfidtag);

	$stmt=$con->prepare($sql);
	$stmt->execute($data);
	header("location:admin_dashboard.php");
?>