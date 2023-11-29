<?php
// Include pagination library file 
include_once 'Pagination.class.php';

// Include database configuration file 
include 'includes/session.php';

// Set some useful configuration 
$baseURL = 'getSection.php';
$limit = 5;

// Count of all records 
$query = $con->query("SELECT COUNT(*) as rowNum FROM section_tbl");
$result = $query->fetch(PDO::FETCH_ASSOC);
$rowCount = $result['rowNum'];

// Initialize pagination class 
$pagConfig = array(
    'baseURL' => $baseURL,
    'totalRows' => $rowCount,
    'perPage' => $limit,
    'contentDiv' => 'dataContainer',
    'link_func' => 'searchFilter'
);
$pagination = new Pagination($pagConfig);

// Fetch records based on the limit 
// $query = $con->query("SELECT * FROM attendance_tbl LEFT JOIN student_tbl ON attendance_tbl.student_id=student_tbl.studentid ORDER BY id DESC LIMIT $limit");
$query = $con->query("SELECT * FROM section_tbl ORDER BY section_name ASC LIMIT $limit")
    ?>

<div class="datalist-wrapper">
    <!-- Data list container -->
    <div id="dataContainer" class="container" style="font-family:sans-seriff; width: 100%;">
        <div class="table-container" id="tball">
            <table class="table table-hover text-center" id="faculty_attendance">
                <thead>
                    <tr class="table-secondary">
                    <th><input type="checkbox" id="selectAll" onchange="selectAllItems()"></th>
                        <th>Section</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody id="attendance_list">
                    <?php
                    if ($query->rowCount() > 0) {
                        $i = 0;
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            $i++;
                            ?>
                            <tr>
                                <td></td>
                                <td>
                                    <?php echo $row["section_name"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["department_name"]; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="6">No records found...</td></tr>';
                    }
                    ?>

                </tbody>
            </table>
            <!-- Display pagination links -->
            <p class="text-dark">
                <?php echo $pagination->createLinks(); ?>
        </div>

    </div>