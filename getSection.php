<?php
if (isset($_POST['page'])) {
    // Include pagination library file 
    include_once 'Pagination.class.php';

    // Include database configuration file 
    include 'includes/session.php';

    // Set some useful configuration 
    $baseURL = 'getSection.php';
    $offset = !empty($_POST['page']) ? $_POST['page'] : 0;
    $limit = 5;


    $whereSQL = '';
    if (!empty($_POST['sectionSearch']) && $_POST['sectionSearch'] !== "All") {
        $whereSQL = " WHERE (year_level LIKE '%" . $_POST['sectionSearch'] . "%')";
    }
    // Count of all records 
    $query = $con->query("SELECT COUNT(*) as rowNum FROM section_tbl" . $whereSQL);
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
    $query = $con->query("SELECT * FROM section_tbl" . $whereSQL . " ORDER BY section_name ASC LIMIT $offset,$limit")
        ?>
    <!-- Data list container -->
    <div style="overflow-y:auto; max-height:300px;">
        <table class="table table-hover text-center" id="section_table">
            <thead>
                <tr class="table-secondary">
                    <th>Delete</th>
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
                            <td><input type="checkbox" class="delete-checkbox" data-section-id="<?php echo $row['section_id']; ?>">
                            </td>
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
        <h3 class="text-dark">Update Section using CSV</h3>
        <div class="mb-3">
            <label for="formFile" class="form-label text-dark">Upload Student CSV</label>
            <input type="file" name="file" id="file" accept=".csv" required class="form-control">
        </div>
        <button onclick="addCsv()" id="button" class="btn btn-success">Upload</button>
        <button onclick="downloadCsv()" class="btn btn-secondary" style="align-self: flex-end;">Download Sample CSV</button>

    </div>

    <!-- Display pagination links -->
    <p>
        <?php echo str_replace('<a', '<a class="text-dark"', $pagination->createLinks()); ?>
    </p>

    <button onclick="getCheckedCheckboxIds()" class="btn btn-primary" style="align-self: flex-end;">Delete</button>
    <button onclick="addSection()" class="btn btn-success" style="align-self: flex-end;">Add Section</button>
    <?php

}

?>