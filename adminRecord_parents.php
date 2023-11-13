<?php
include 'includes/session.php';
?>
<div class="container" style="font-family:sans-seriff; width: 100%;">
<link rel="stylesheet" type="text/css" href="cssCodes/recordStudent.css">

  <div>
    <table id="studentsRecord_table" class="table table-hover text-center">
      <thead>
        <tr class="table-secondary">
          <th>Student ID</th>
          <th>Name</th>
          <th>Section</th>
          <th>Department</th>
          
      </thead>
      <tbody>
        <?php
        $con = $pdo->open();
        try {
          $stmt1 = $con->prepare("SELECT * FROM parent_tbl");
          $stmt1->execute();
          $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
      
          foreach ($rows as $row) {
              echo "<tr>";
              echo "<td>" . $row['studentid'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['sectionid'] . "</td>";
              echo "<td>" . $row['department'] . "</td>";
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