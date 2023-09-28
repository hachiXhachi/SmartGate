<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='src/main.css'>
<script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
  <meta charset="UTF-8">
  <title>Populate Div with Another Div</title>
 
</head>
<body>
<form action="sample_send_email.php" method="post">
<input type="text" name="name" id="name" class="form-control" placeholder="name" required>
<br><br>
<input type="email" name="email" id="email" class="form-control" placeholder="email" required>
<br><br>
<input type="text" name="subject" id="subject" class="form-control" required placeholder="subject">
<br><br>
<textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="message"></textarea>
<br><br>
<button class="btn btn-primary">Send</button>
</form>

</body>

</html>
