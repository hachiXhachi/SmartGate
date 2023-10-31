
<?php
// Include pagination library file 
include_once 'Pagination.class.php';

// Include database configuration file 
include 'includes/session.php';

// Set some useful configuration 
$baseURL = 'getData.php';
$limit = 5;

// Count of all records 
$query = $con->query("SELECT COUNT(*) as rowNum FROM attendance_tbl");
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
$query = $con->query("SELECT * FROM student_tbl LEFT JOIN attendance_tbl ON student_tbl.studentid=attendance_tbl.student_id ORDER BY id DESC LIMIT $limit");
?>
<!-- <link rel='stylesheet' href='src/main.css'>
<script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<!-- <div class="search-panel">
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="keywords" placeholder="Type keywords..."
                onkeyup="searchFilter();">
        </div>
        <div class="form-group col-md-4">
            <select class="form-control" id="filterBy" onchange="searchFilter();">
                <option value="">Filter by Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    </div>
</div> -->
<div class="datalist-wrapper">
    <!-- Loading overlay -->
    <!-- <div class="loading-overlay">
        <div class="overlay-content">Loading...</div>
    </div> -->

    <!-- Data list container -->
    <div id="dataContainer" class="container" style="font-family:sans-seriff; width: 100%;">
    <div class="table-container" id="tball">
    <table class="table table-hover text-center">
      <thead>
        <tr class="table-secondary">
          <th>Date</th>
          <th>Time-in</th>
          <th>Time-out</th>
          <th>Student Name</th>
          <th>Section</th>
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

                            <td>
                                <?php echo $row["date"]; ?>
                            </td>
                            <td>
                                <?php echo $row["time_in"]; ?>
                            </td>
                            <td>
                                <?php echo $row["time_out"]; ?>
                            </td>
                            <td>
                                <?php echo $row["name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["sectionid"]; ?>
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
       <p> <?php echo $pagination->createLinks(); ?>
    </div>
</div>