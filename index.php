<?php
include 'includes/session.php';

if (isset($_SESSION['mode'])) {
	if ($_SESSION['mode'] == 'parent') {
		header('location: parents_dashboard.php');
	} else if ($_SESSION['mode'] == 'admin') {
		header('location: admin_dashboard.php');
	} else if ($_SESSION['mode'] == 'faculty') {
		header('location: faculty_dashboard.php');
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="cssCodes/main.css">
	<title>BulSU-SC Smart Gate</title>
	<style>
		.form-control::placeholder {
			word-spacing: 3px;
			font-size: 12px;
			color: #A0ABAA;
			font-family: sans-serif;
		}

		#container {
			width: 100%;
			max-width: 500px;
			margin: 0 auto;
			padding-top: 25px;
			padding-left: 25px;
			padding-right: 25px;
			padding-bottom: 75px;
			border-radius: 50px;
			background-color: rgb(84, 84, 84, .9);
		}

		#container p {
			font-size: 16px;
			line-height: 1.6;
			color: #333;
		}

		@media (max-width: 600px) {
			#container {
				max-width: 300px;
				padding-top: 10px;
				padding-left: 10px;
				padding-right: 10px;
				padding-bottom: 30px;
				border-radius: 50px;
			}

			h2 {
				font-size: 20px;
			}

			h4 {
				font-size: 15px;
			}

			.image {
				width: 50px;
			}
		}
	</style>
</head>

<body id="background-image-container">
	<!-- error modal -->
	<div class="modal fade" id="Errormodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
		style="font-family:arial">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Please fill out the fields properly</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id=Errormodalbody>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar" href="#" id="navbar">
		<div class="navbar-brand" style="display: flex;align-items: center;justify-content: center;margin-left:5%;">
			<div class="image">
				<img src="assets/bulsu_icon.png" class="img-fluid" style="width:85px; margin-right: 20px;">
			</div>
			<div class="text-white">
				<h2>Bulacan State University<br></h2>
				<h4>Sarmiento Campus</h4>
			</div>

		</div>

	</nav>
	<form method="post" id="loginForm">
		<div class="container position-absolute top-50 start-50 translate-middle text-white" id="container">
			<img src="assets/logo_sarmiento.png" class="img-thumbnail bg-transparent"
				style="border:none ; width:20%; display: block; margin-left: auto; margin-right: auto;"
				alt="Bulsu sarmiento campus">
			<div class="input-group mb-3 bg-transparent">
				<span class="input-group-text bg-transparent" style="border:2px solid black; border-right: none;">
					<img src="assets/icon_email.jpg" class="img-thumbnail bg-transparent"
						style="border:none; width:30px;" alt="emailicon">
				</span>
				<input type="text" name="email" class="form-control bg-transparent text-white "
					style="border:2px solid black;border-left:none; " placeholder="E M A I L" aria-label="E-mail">
			</div>
			<div class="input-group mb-3 bg-transparent">
				<span class="input-group-text bg-transparent" style="border:2px solid black; border-right: none;">
					<img src="assets/icon_password.jpg" class="img-thumbnail bg-transparent"
						style="border:none; width:30px;" alt="passicon">
				</span>
				<input type="password" name="password" class="form-control bg-transparent text-white "
					style="border:2px solid black;border-left:none; ;" placeholder="P A S S W O R D"
					aria-label="Password">
			</div>
			<div class="d-flex justify-content-center">
				<button class="btn btn-outline-dark" style="border:3px solid black; color: #A0ABAA;">L O G I N</button>

			</div>
			<div class="d-flex justify-content-center">
				<a class="icon-link icon-link-hover text-white" style="--bs-link-hover-color-rgb: 232,255,254;"
					href="#">
					Forgot Password
				</a>
			</div>


	</form>



	</div>
	<nav class="navbar navbar-expand-lg fixed-bottom" style="font-family: sans-seriff;">
		<div class="container-fluid">
			<a class="navbar-brand text-white" href="#">Contact Us</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<div class="container-fluid">
							<a class="navbar-brand text-white" href="#">
								<img src="assets/Kaypian.png" alt="Logo" width="30"
									class="d-inline-block align-text-center">
								Kaypian, San Jose Del Monte Bulacan
							</a>
						</div>
					</li>
					<li class="nav-item">
						<div class="container-fluid">
							<a class="navbar-brand text-white" href="#">
								<img src="assets/contact.png" alt="Logo" width="30"
									class="d-inline-block align-text-center">
								912-123-1234
							</a>
						</div>
					</li>
					<li class="nav-item">
						<div class="container-fluid">
							<a class="navbar-brand text-white" href="#">
								<img src="assets/email.png" alt="Logo" width="30"
									class="d-inline-block align-text-center">
								officebulsusarmiento@bulsu.edu.ph
							</a>
						</div>
				</ul>
			</div>
		</div>
	</nav>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function () {
		$('#loginForm').submit(function (event) {
			event.preventDefault(); // Prevent the form from submitting normally

			// Get the form data
			var formData = $(this).serialize();

			// Send an AJAX request
			$.ajax({
				type: 'POST',
				url: 'verify_login.php',
				data: formData,
				dataType: 'json', // Expect JSON response

				success: function (data) {
					console.log(data);
					if (data.status === 'success') {
						if (data.mode === 'parent') {
							window.location.href = 'parents_dashboard.php';
						} else if (data.mode === 'admin') {
							window.location.href = 'admin_dashboard.php';
						} else if (data.mode === 'faculty') {
							window.location.href = 'faculty_dashboard.php';
						} else if (data.mode === 'security') {
							window.location.href = 'security_dashboard.php';
						}
					} else {
						document.getElementById('Errormodalbody').innerHTML = data.error_message;
						$('#Errormodal').modal('show');
					}
				}
			});
		});
	});


</script>

</html>