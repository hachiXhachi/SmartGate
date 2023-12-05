<?php
include 'includes/session.php';
// Process CSV file
if ($_FILES["file"]["error"] == 0) {
    $file = $_FILES["file"]["tmp_name"];

    $handle = fopen($file, "r");

    $con = $pdo->open();

    $headers = fgetcsv($handle, 1000, ",");
    
    $requiredColumns = ['studentid', 'name', 'sectionid', 'department', 'schoolemail', 'year_level'];

    $columnPositions = array_flip($headers);

    foreach ($requiredColumns as $column) {
        if (!isset($columnPositions[$column])) {
            fclose($handle);
            die("Error: The CSV file is missing the '$column' column.");
        }
    }
    
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $studentid = $data[0];
        $name = $data[1];
        $sectionid = $data[2];
        $department = $data[3];
        $schoolemail = $data[4];
        $year_level = $data[5];

        // Check if the user with the same studentid already exists
        $result = $con->query("SELECT * FROM student_tbl WHERE studentid='$studentid'");
        $existing_user = $result->fetch(PDO::FETCH_ASSOC);

        if ($existing_user) {
            // Update existing user
            $stmt = $con->prepare("UPDATE student_tbl SET studentid='$studentid', name='$name', sectionid='$sectionid', department='$department', schoolemail='$schoolemail', year_level='$year_level' WHERE studentid='$studentid'");
            $stmt->execute();
        } else {
            // Insert new user
            $sql = "INSERT INTO student_tbl(studentid, name, sectionid, department, schoolemail, year_level) VALUES (?, ?, ?, ?, ?, ?)";
            $data = array($studentid, $name, $sectionid, $department, $schoolemail, $year_level);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        }
    }

    fclose($handle);
    echo "File uploaded successfully";
} else {
    echo "Error uploading file";
}
?>