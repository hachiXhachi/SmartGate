<?php
if (isset($_POST['page'])) {
    // Include pagination library file 
    include_once 'Pagination.class.php';

    // Include database configuration file 
    include 'includes/session.php';

    // Set some useful configuration 
    $baseURL = 'getData.php';
    $offset = !empty($_POST['page']) ? $_POST['page'] : 0;
    $limit = 5;

   
    $whereSQL = ''; 
    if (!empty($_POST['sectionSearch']) && $_POST['sectionSearch'] !== "All") { 
      $whereSQL = " WHERE (sectionid LIKE '%" . $_POST['sectionSearch'] . "%')"; 
  }
    // Count of all records 
    $query = $con->query("SELECT COUNT(*) as rowNum FROM student_tbl" . $whereSQL);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $rowCount = $result['rowNum'];

    // Initialize pagination class 
    $pagConfig = array(
        'baseURL' => $baseURL,
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'currentPage' => $offset,
        'contentDiv' => 'dataContainer',
        'link_func' => 'searchFilter'
    );
    $pagination = new Pagination($pagConfig);

    // Fetch records based on the offset and limit 
    // $query = $con->query("SELECT * FROM attendance_tbl LEFT JOIN student_tbl ON attendance_tbl.student_id=student_tbl.studentid" . $whereSQL . " ORDER BY id DESC LIMIT $offset,$limit");
    $query = $con->query("SELECT * FROM student_tbl". $whereSQL ." ORDER BY studentid DESC LIMIT $offset,$limit")
    ?>
    <!-- Data list container --><div>
        <table class="table table-hover text-center">
        <thead>
        <tr class="table-secondary">
        <th>Student Name</th>
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
                        <tr data-student-id="<?php echo $row["studentid"]; ?>" data-student-name="<?php echo $row['name']?>">

                            <td>
                                <?php echo $row["name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["sectionid"]; ?>
                            </td>
                            <td>
                                <?php echo $row["department"]; ?>
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
    </div>
    

    <!-- Display pagination links -->
  <p class="text-dark"><?php echo $pagination->createLinks(); ?></p>  
<?php
}
?>