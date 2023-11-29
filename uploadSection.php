<?php
include 'includes/session.php';
// Process CSV file
if ($_FILES["file"]["error"] == 0) {
    $file = $_FILES["file"]["tmp_name"];

    $handle = fopen($file, "r");

    $con = $pdo->open();

    $headers = fgetcsv($handle, 1000, ",");
    
    $requiredColumns = ['section_name', 'department_name', 'year_level'];

    $columnPositions = array_flip($headers);

    foreach ($requiredColumns as $column) {
        if (!isset($columnPositions[$column])) {
            fclose($handle);
            die("Error: The CSV file is missing the '$column' column.");
        }
    }
    
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $section_name = $data[0];
        $department_name = $data[1];
        $year_level = $data[2];

        // Check if the user with the same studentid already exists
        $result = $con->query("SELECT * FROM section_tbl WHERE section_name='$section_name'");
        $existing_user = $result->fetch(PDO::FETCH_ASSOC);

        if ($existing_user) {
            // Update existing user
            $stmt = $con->prepare("UPDATE section_tbl SET section_name='$section_name', department_name='$department_name', year_level='$year_level' WHERE section_name='$section_name'");
            $stmt->execute();
        } else {
            // Insert new user
            $sql = "INSERT INTO section_tbl(section_name, department_name, year_level) VALUES (?, ?, ?)";
            $data = array($section_name, $department_name, $year_level);
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