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
          $con = $pdo->open();
          $stmt1 = $con->prepare("SELECT * FROM student_tbl");
          $stmt1->execute();
          foreach ($stmt1 as $row1) {
            echo "<td>" . $row1['studentid'] . "</td>";
            echo "<td>" . $row1['name'] . "</td>";
            echo "<td>" . $row1['sectionid'] . "</td>";
            echo "<td>" . $row1['department'] . "</td>";
            echo "</tr>";
          }
          
        } catch (PDOException $e) {

        }
        ?>
      </tbody>
    </table>
  </div>
</div>