<?php
	$mobile_token=$_POST["token"];
	$Write="<?php $" . "mobile_token='" . $mobile_token . "'; " . "echo $" . "mobile_token;" . " ?>";
	file_put_contents('mobileTokenContainer.php',$Write);
?>