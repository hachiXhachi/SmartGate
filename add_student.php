<?php
include 'includes/connection.php';
$con = $pdo->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentid = $_POST['studentid'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $name = $first_name . " " . $middle_name . " " . $last_name;
    $sectionid = $_POST['sectionid'];
    $department = $_POST['department'];
    $schoolemail = $_POST['schoolemail'];
    $rfidtag = $_POST['rfidtag'];

    $sql = "INSERT INTO student_tbl(studentid, name, sectionid, department, schoolemail, rfidtag) VALUES (?, ?, ?, ?, ?, ?)";
    $data = array($studentid, $name, $sectionid, $department, $schoolemail, $rfidtag);

    $stmt = $con->prepare($sql);
    if ($stmt->execute($data)) {
        // Send a JSON success response to the client
        $Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
        file_put_contents('UIDContainer.php', $Write);
        echo json_encode(array("success" => "Form submitted successfully"));
    } else {
        // Send a JSON error response to the client
        echo json_encode(array("error" => "Form submission failed"));
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode(array("error" => "Invalid request"));
}
?>