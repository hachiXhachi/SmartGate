<?php
include 'includes/session.php';
$con = $pdo->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $addSection = $_POST['addSectionModalValue'];
    $addDepartment = $_POST['addDepartmentMdal'];
    $addYrlvl = $_POST['yrLvlModal'];

    // Check if the section_name already exists
    $checkDuplicateQuery = "SELECT COUNT(*) as count FROM section_tbl WHERE section_name = ?";
    $checkDuplicateData = array($addSection);

    $checkDuplicateStmt = $con->prepare($checkDuplicateQuery);
    $checkDuplicateStmt->execute($checkDuplicateData);
    $count = $checkDuplicateStmt->fetch(PDO::FETCH_ASSOC)['count'];

    if ($count > 0) {
        // Send a JSON error response to the client if the section_name already exists
        echo json_encode(array("error" => "Section name already exists"));
    } else {
        // Insert data into section_tbl
        $sql = "INSERT INTO section_tbl(section_name, department_name, year_level) VALUES (?, ?, ?)";
        $data = array(strtoupper($addSection), strtoupper($addDepartment), $addYrlvl);

        $stmt = $con->prepare($sql);
        if ($stmt->execute($data)) {
            // Send a JSON success response to the client
            echo json_encode(array("success" => "Section added successfully"));
        } else {
            // Send a JSON error response to the client
            echo json_encode(array("error" => "Form submission failed"));
        }
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode(array("error" => "Invalid request"));
}
?>
