<?php
include 'includes/session.php';
?>
<style>
  tr,
table,
td,
th {
  border: 2px solid black;
}

#container {
  max-height: 400px;
  overflow-y: auto;
  max-width: 100%;
  width: auto;
}

@media (max-width: 767px) {
  #container {
    max-height:200px;
    overflow-y: auto;
    overflow-x: none;
    width: auto;
  }

}
</style>
<div class="container"  style="font-family:sans-seriff; width: 100%;">
  <div id="container">
    <table id="studentsRecord_table" class="table table-hover text-center">
      <thead>
        <tr class="table-secondary">
          <th>Student ID</th>
          <th>Name</th>
          <th>Section</th>
          <th>Department</th>
          
      </thead>
      <tbody >
        <?php
        $con = $pdo->open();
        try {
          $stmt1 = $con->prepare("SELECT * FROM student_tbl");
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