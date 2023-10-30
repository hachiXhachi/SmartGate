<?php
include 'includes/session.php';
$selectedValue = $_POST["selectedValue"];
try {
  if ($selectedValue == "All") {
    $con = $pdo->open();
    $stmt2 = $con->prepare("SELECT * FROM student_tbl LEFT JOIN attendance_tbl ON student_tbl.studentid=attendance_tbl.student_id");
    $stmt2->execute();
    foreach ($stmt2 as $row2) {
      echo "<td>" . $row2['date'] . "</td>";
      echo "<td>" . $row2['time_in'] . "</td>";
      echo "<td>" . $row2['time_out'] . "</td>";
      echo "<td>" . $row2['name'] . "</td>";
      echo "<td>" . $row2['sectionid'] . "</td>";
      echo "</tr>";
    }
  } else {
    $con = $pdo->open();
    $stmt2 = $con->prepare("SELECT * FROM attendance_tbl LEFT JOIN student_tbl ON student_tbl.studentid=attendance_tbl.student_id WHERE sectionid=:sectionID");
    $stmt2->execute(['sectionID' => $selectedValue]);
    foreach ($stmt2 as $row2) {
      echo "<td>" . $row2['date'] . "</td>";
      echo "<td>" . $row2['time_in'] . "</td>";
      echo "<td>" . $row2['time_out'] . "</td>";
      echo "<td>" . $row2['name'] . "</td>";
      echo "<td>" . $row2['sectionid'] . "</td>";
      echo "</tr>";
    }

  }
} catch (PDOException $e) {

}
?>