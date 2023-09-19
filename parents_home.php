<?php
include 'includes/session.php';
?>
<div class="cotainer position-absolute top-50 start-50 translate-middle text-white" id="container" style="font-family:sans-serif;display: flex;align-items: center;justify-content: center;">
      <img src="icons/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
      <div class="text-white">
            <?php
              $con = $pdo->open();
                $stmt = $con->prepare("SELECT *, student_tbl.name AS studname, childtv.id AS childtv_id FROM childtv LEFT JOIN student_tbl ON student_tbl.studentid=childtv.student_id WHERE parent_id=:user_id");
                  $stmt->execute(['user_id'=>$user['parentid']]);
                  foreach ($stmt as $row) {
                    echo "<h2>".$row['name']."<br></h2><h5>".$row['studentid']."</h5>";
                  }
              ?>          
            </div>
    </div>