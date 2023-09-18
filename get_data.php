<?php
    include 'includes/session.php';
    
    // Fetch data from the database
    $query = "SELECT section_id, section_name,section_department FROM section_tbl";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return data as JSON
    echo json_encode($data);
    ?>