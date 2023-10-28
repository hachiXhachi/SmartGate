<?php
include 'includes/session.php';
?>
<div class="container" style="font-family:sans-seriff; width: 100%;">
  <div class="table-container" id="tball">
    <table class="table table-hover text-center">
      <thead>
        <tr class="table-secondary">
          <th>Date</th>
          <th>Time-in</th>
          <th>Time-out</th>
          <th>Student Name</th>
          <th>Section</th>
        </tr>
      </thead>
      <tbody id="attendance_list">
        <?php
        $con = $pdo->open();
        try {
          $con = $pdo->open();
          $stmt1 = $con->prepare("SELECT * FROM attendance_tbl ");
          $stmt1->execute();
          foreach ($stmt1 as $row1) {
            $stmt2 = $con->prepare("SELECT * FROM student_tbl LEFT JOIN attendance_tbl ON student_tbl.studentid=attendance_tbl.student_id");
            $stmt2->execute();
            foreach ($stmt2 as $row2) {
              echo "<td>" . $row2['date'] . "</td>";
              echo "<td>" . $row2['time_in'] . "</td>";
              echo "<td>" . $row2['time_out'] . "</td>";
              echo "<td>" . $row2['name'] . "</td>";
              echo "<td>" . $row2['section'] . "</td>";
              echo "</tr>";
            }
          }
        } catch (PDOException $e) {

        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script>
  function changePage(page) {
    // Update the URL with the new page number
    window.location.href = 'your_page.php?page=' + page;
  }
</script>