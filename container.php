<?php
	$token=$_POST["token"];
	$Write="<?php $" . "token='" . $token . "';?>";
	file_put_contents('mobileTokenContainer.php',$Write);
?>