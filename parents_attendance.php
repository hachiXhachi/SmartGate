<?php
include 'includes/session.php';
?>
<div class="container" style="font-family:sans-seriff; width: 100%;">
  <style>
    tr,
    table,
    td,
    th {
      border: 2px solid black;
    }

    #tball {
      max-height: 400px;
      overflow-y: auto;
      max-width: 100%;
      width: auto;
    }

    @media (max-width: 767px) {
      #tball {
        height: 300px;
      }
    }
  </style>
  <div class="table-container" id="tball">
    <table class="table table-hover text-center">
      <thead>
        <tr class="table-secondary">
          <th>Student Number</th>
          <th>Name</th>
          <th>Section</th>
          <th>Department</th>
          <th>Date</th>
          <th>Time-In</th>
          <th>Time-Out</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $con = $pdo->open();
        try {
          $con = $pdo->open();
          $stmt1 = $con->prepare("SELECT * FROM childtv LEFT JOIN student_tbl ON student_tbl.studentid=childtv.student_id WHERE parent_id=:user_id");
          $stmt1->execute(['user_id' => $user['parentid']]);
          foreach ($stmt1 as $row1) {

            $stmt2 = $con->prepare("SELECT * FROM student_tbl LEFT JOIN attendance_tbl ON student_tbl.studentid=attendance_tbl.student_id WHERE student_id=:user_id");
            $stmt2->execute(['user_id' => $row1['studentid']]);
            foreach ($stmt2 as $row2) {
              echo "<td>" . $row2['studentid'] . "</td>";
              echo "<td>" . $row2['name'] . "</td>";
              echo "<td>" . $row2['sectionid'] . "</td>";
              echo "<td>" . $row2['department'] . "</td>";
              echo "<td>" . $row2['date'] . "</td>";
              echo "<td>" . $row2['time_in'] . "</td>";
              echo "<td>" . $row2['time_out'] . "</td>";
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