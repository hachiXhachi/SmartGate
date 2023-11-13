<?php
include 'includes/session.php';
?>
<div class="container" style="font-family:sans-seriff; width: 100%;">
<link rel="stylesheet" type="text/css" href="cssCodes/recordStudent.css">

  <div>
    <table id="parentRecord_table" class="table table-hover text-center">
      <thead>
        <tr class="table-secondary">
          <th>Name</th>
          <th>Email</th>

          
      </thead>
      <tbody>
        <?php
        $con = $pdo->open();
        try {
          $stmt1 = $con->prepare("SELECT * FROM parent_tbl");
          $stmt1->execute();
          $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
      
          foreach ($rows as $row) {
            echo "<tr data-id='" . $row['parentid'] . "'>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        
      } catch (PDOException $e) {
          // Handle the exception
      }
        $pdo->close();
        ?>
      </tbody>
    </table>
  </div>
</div>