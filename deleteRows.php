<?php
if (isset($_POST['sectionIds'])) {
    include 'includes/session.php';

    $sectionIds = explode(',', $_POST['sectionIds']);

    foreach ($sectionIds as $sectionId) {
        // Perform the deletion for each section ID
        $con->query("DELETE FROM section_tbl WHERE section_id = " . $sectionId);
    }

    // You can handle the response accordingly
    echo 'Rows deleted successfully';
}
?>
