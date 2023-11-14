<?php
include 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID from the AJAX request
    $id = $_POST["id"];

    // Start a transaction to ensure atomicity
    $con->beginTransaction();

    try {
        // Delete from childtv table first
        $deleteChildSql = "DELETE FROM childtv WHERE parent_id = ?";
        $deleteChildStmt = $con->prepare($deleteChildSql);
        $deleteChildStmt->execute([$id]);

        // Delete from parent_tbl
        $deleteParentSql = "DELETE FROM parent_tbl WHERE parentid = ?";
        $deleteParentStmt = $con->prepare($deleteParentSql);
        $deleteParentStmt->execute([$id]);

        // Commit the transaction if all queries are successful
        $con->commit();

        // Send a JSON success response to the client
        echo json_encode([
            'status' => 'Success'
        ]);
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $con->rollBack();

        // Send a JSON error response to the client
        echo json_encode([
            'status' => 'Error',
            'message' => $e->getMessage() // Output the error message
        ]);
    }
} else {
    // Handle cases where the request is not a POST request
    echo json_encode([
        'status' => 'Invalid'
    ]);
}
?>
