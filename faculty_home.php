<?php
include 'includes/session.php';
?>
<div class="cotainer position-absolute top-50 start-50 translate-middle text-white" id="container"
  style="font-family:sans-serif;display: flex;align-items: center;justify-content: center;">
  <img src="assets/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
  <div class="text-white">
    <?php
    echo "<h3>" . $user['name'] . "</h3>";
    echo "<h6>" . $user['email'] . "</h6>";
    ?>
  </div>
</div>