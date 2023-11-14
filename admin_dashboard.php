<?php
include 'includes/session.php';
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='cssCodes/main.css'>
    <script src="https://kit.fontawesome.com/613bb0837d.js" crossorigin="anonymous"></script>
    <style>
        .content {
            min-height: 100vh;
            width: 100%;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-input-speech-button,
        input[type="number"]::-webkit-clear-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }

        .under_sidebar {
            position: relative;
            max-height: 75px;
            width: auto;
            background-color: #545454;
            transition: all .2s ease;
        }

        .under_sidebar.active {
            margin-bottom: 20px;
            transition: all .2s ease;
        }

        .under_sidebar.d-none {
            position: relative;
            margin-bottom: 0;
            transition: all .2s ease;
        }

        .under_sidebar2 {
            position: relative;
            max-height: 75px;
            width: auto;
            background-color: #545454;
            transition: all .2s ease;
        }

        .under_sidebar2.active {
            margin-bottom: 20px;
            transition: all .2s ease;
        }

        .under_sidebar2.d-none {
            position: relative;
            margin-bottom: 0;
            transition: all .2s ease;
        }

        #side_nav {
            position: fixed;
            height: 100vh;
            min-width: 270px;
            max-width: 300px;
            background-color: #773535;
            transition: all .2s ease;
            z-index: 1;
        }

        #side_nav.click {
            margin-left: 0;
            transition: all .2s ease;
        }

        #side_nav.d-mb-none {
            margin-left: -270px;
            position: fixed;
            min-height: 100vh;
            z-index: 1;
        }

        hr,
        .h-color {
            background: white;
        }

        .sidebar li.active {
            background: black;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            color: #000;
        }

        .sidebar li a {
            color: #fff;
        }

        #container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding-top: 25px;
            padding-left: 25px;
            padding-right: 25px;
            padding-bottom: 50px;
            background-color: rgb(84, 84, 84);
        }

        #base {
            width: 100%;
            margin: 0 auto;
        }

        #container p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        @media (max-width: 767px) {
            #side_nav {
                margin-left: -270px;
                position: fixed;
                min-height: 100vh;
                z-index: 1;
            }

            #side_nav.active {
                margin-left: 0;
            }

            h2 {
                font-size: 20px;
            }

            h4 {
                font-size: 15px;
            }

            .image {
                width: 50px;
                margin-right: 5px;
            }

            .table-container {
                max-height: 300px;
            }
        }
    </style>
</head>
<!-- student and prof Modal -->
<div class="modal fade" id="confirmationModal" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="font-family:arial">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Student Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="confirmationBody">
                Create this Account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="confirmButton">Add Account</button>
            </div>
        </div>
    </div>
</div>
<!-- parent Modal -->
<div class="modal fade" id="parentModal" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="font-family:arial">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="parentModalLabel">New Parent Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="parentConfirmationBody">
                Create this Parent Account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="parentconfirmButton" onclick="getInputValues();">Add
                    Account</button>
            </div>
        </div>
    </div>
</div>
<!-- Error Modal -->
<div class="modal fade" id="Errormodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="font-family:arial">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="exampleModalLabel">
                <h1 class="modal-title fs-5">Please fill out the fields Properly</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id=Errormodalbody>
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Success Modal -->
<div class="modal fade" id="succModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="font-family:arial">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="succModalLabel">
                <h1 class="modal-title fs-5">Success</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id=succmodalbody>
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--student record modal -->
<div class="modal fade" id="studentRecordModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" style="font-family:arial">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form elements for editing data here -->
                <form id="editForm">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="column1">Name</label>
                                <input type="text" class="form-control bg-transparent" name="name" required
                                    pattern="[A-Za-z ]{2,16}" id="name" placeholder="Name"
                                    style="border: 2px solid black;">
                            </div>
                        </div>
                        <!-- Second Row -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="column4">Student Number</label>
                                <input type="number" class="form-control bg-transparent" name="studentid" id="studid"
                                    placeholder="Student Number" min="0" max="9999999999"
                                    oninput="validateNumberInput(this);checkMaxLength(this, 10);"
                                    style="border: 2px solid black;" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group text-white">
                                <label for="sectionSelect">Choose a Section:</label>
                                <select class="form-control bg-transparent" id="sectionSelect" name="sectionid"
                                    onchange="changeFunction()" style="width:100%; border: 2px solid black;">
                                    <option value="" disabled selected hidden>Section</option>
                                    <?php

                                    $sql = "SELECT section_name, department_name FROM section_tbl";
                                    $stmt = $con->query($sql);

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $sectionName = $row['section_name'];
                                        echo '<option id="option">' . $sectionName . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="column3">Department</label>
                                <input type="text" class="form-control bg-transparent" id="department" name="department"
                                    style="border: 2px solid black;" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="column7">Email</label>
                                <input type="email" class="form-control bg-transparent" name="schoolemail" id="email"
                                    placeholder="Email" style="width:100%; border: 2px solid black;" required>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="column6">Rfid Code</label>
                                <textarea rows="1" name="rfidtag" maxlength="12" id="getUID"
                                    class="form-control bg-transparent column6"
                                    style="border: 2px solid black; resize:none;"
                                    placeholder="Please Tag your Card"></textarea>
                            </div>
                        </div>

                    </div>
            </div>
            <!-- Add other fields as needed -->
            <button type="button" id="studentSubmit" class="btn btn-primary">Save Changes</button>

        </div>

        </form>
    </div>
</div>
<!--Faculty update modal -->
<div class="modal fade" id="facultyRecordModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" style="font-family: arial;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prof_lname">Name</label>
                            <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}"
                                id="prof_nameUpdate" name="prof_name" placeholder="Name"
                                style="border: 2px solid black;">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prof_email">Email</label>
                            <input type="email" class="form-control bg-transparent" id="prof_emailUpdate" name="email"
                                placeholder="Email" style="width: 100%; border: 2px solid black;" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="facultySubmit" class="btn btn-primary">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--Parent update modal -->
<div class="modal fade" id="parentRecordModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" style="font-family:arial">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="parentUpdate">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prof_lname">Name</label>
                            <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}"
                                id="parent_nameUpdate" name="prof_name" placeholder="Name"
                                style="border: 2px solid black;">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="prof_email">Email</label>
                            <input type="email" class="form-control bg-transparent" id="parent_emailUpdate" name="email"
                                placeholder="Email" style="width:100%; border: 2px solid black;" required>
                        </div>
                    </div>


            </div>
            <button type="button" id="parentSubmit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<body id="background-image-dashboard">
    <div class="main-container d-flex" style="font-family: sans-seriff;">
        <div class="sidebar d-mb-none" id="side_nav">
            <div class="header-box px-3 pt-3 pb-4 py-2 d-flex justify-content-between">
                <img src="assets/logo_sarmiento.png" width="40" class="img-fluid"> &nbsp;
                <h5 class="text-white py-1 px-2">Admin Dashboard</h5>
                <button class="btn d-block px-1 py-0 close-btn text-white"><i
                        class="fa-solid fa-bars-staggered"></i></button>
            </div>
            <hr class="h-color mx-4">
            <ul class="list-unstyled px-5 py-3">
                <li class="active"><a class="text-decoration-none text-white d-block text-center py-2"
                        onclick="loadView('admin_home')">
                        <i class="fa-solid fa-house"></i> Home</a></li>
                <!-- ---------------------------------------------------- -->

                <hr class="h-color mx-4">
                <!--  ---------------------------------------------------- -->
                <li class="dropdown"><a class="text-decoration-none text-white d-block text-center py-2">
                        <i class="fa-solid fa-clipboard-user"></i> View Records</a>
                    <div class="under_sidebar d-none">
                        <ul class="list-unstyled">
                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('adminRecord_students', studentSelect)">
                                    <i class="fa-solid fa-graduation-cap"></i> Student</a></li>

                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('adminRecord_parents', showParent)">
                                    <i class="fa-solid fa-users"></i> Parents</a></li>

                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('adminRecord_faculty', showFaculty)">
                                    <i class="fa-solid fa-person-chalkboard"></i> Professor</a></li>

                        </ul>
                    </div>
                </li>

                <hr class="h-color mx-4">
                <li class="dropdown2"><a class="text-decoration-none text-white d-block text-center py-2">
                        <i class="fa-solid fa-bell"></i> Create Account</a>
                    <div class="under_sidebar2 d-none">
                        <ul class="list-unstyled">
                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_studentAccount')">
                                    <i class="fa-solid fa-graduation-cap"></i> Student</a></li>

                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_proffesorAccount')">
                                    <i class="fa-solid fa-person-chalkboard"></i> Professor</a></li>
                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_parent')">
                                    <i class="fa-solid fa-user"></i> Parents</a></li>

                        </ul>
                    </div>

                </li>

                <hr class="h-color mx-4">
            </ul>
            <div class="text-center">
                <button type="button" id="logout_button" class="btn tn btn-outline-secondary text-white px-5"
                    style="border: 2px solid black; border-radius: 5px;">Logout</button>
            </div>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg bg-transparent">
                <div class="container-fluid">
                    <div class="navbar-brand d-flex justify-content-between d-block "
                        style="display: flex;align-items: center;justify-content: center;margin-left:5%;">
                        <button class="btn d-block px-1 py-0 open-btn text-white"><i
                                class="fa-solid fa-bars-staggered"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="image">
                            <img src="assets/bulsu_icon.png" class="image img-fluid"
                                style="width:85px; margin-right: 20px;">
                        </div>
                        <div class="text-white">
                            <h2>Bulacan State University
                                <br>
                            </h2>
                            <h4>Sarmiento Campus</h4>
                        </div>
                    </div>
                </div>
            </nav>

        </div>

    </div>
    <div class="base position-absolute top-50 start-50 translate-middle text-white" id="base">
        <div class="cotainer position-absolute top-50 start-50 translate-middle text-white" id="container"
            style="font-family:sans-serif;display: flex;align-items: center;justify-content: center;">
            <img src="assets/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
            <div class="text-white">
                <h2>Jian Kyle Albaro
                    <br>
                </h2>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg fixed-bottom" style="font-family: sans-seriff;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Contact Us</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="#">
                                <img src="assets/Kaypian.png" alt="Logo" width="30"
                                    class="d-inline-block align-text-center">
                                Kaypian, San Jose Del Monte Bulacan
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="#">
                                <img src="assets/contact.png" alt="Logo" width="30"
                                    class="d-inline-block align-text-center">
                                912-123-1234
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="#">
                                <img src="assets/email.png" alt="Logo" width="30"
                                    class="d-inline-block align-text-center">
                                officebulsusarmiento@bulsu.edu.ph
                            </a>
                        </div>
                </ul>
            </div>
        </div>
    </nav>


</body>
<script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    function logoutFunction() {
        window.location.href = 'logout.php';
    }
    document.getElementById("logout_button").addEventListener("click", logoutFunction);

    $(document).ready(function () {
        $("#getUID").load("UIDContainer.php");
        setInterval(function () {
            $("#getUID").load("UIDContainer.php");
        }, 500);
    });
    $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass('active');
        $('.under_sidebar').addClass('d-none');
        $('.under_sidebar2').addClass('d-none');
        $(this).addClass('active');
    });
    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');
        $('.sidebar').removeClass('d-mb-none');
    });
    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');
        $('.sidebar').addClass('d-mb-none');;
    });
    $('.dropdown').on('click', function () {
        $('.under_sidebar').removeClass('d-none');
        $('.under_sidebar').addClass('active');;
    });
    $('.dropdown2').on('click', function () {
        $('.under_sidebar2').removeClass('d-none');
        $('.under_sidebar2').addClass('active');;
    });

    function loadView(viewName, callback) {
        fetch(`${viewName}.php`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('base').innerHTML = data;
                if (callback) {
                    callback();
                }
            })
            .catch(error => {
                console.error('Error loading view:', error);
            });
    }
    // Attach the click event listener for the "Save" button when the modal is shown
    $('#parentRecordModal').on('shown.bs.modal', function () {
        document.getElementById("parentSubmit").addEventListener("click", function (event) {
            // Get the ID of the clicked row
            var id = $(this).data('id');
            // if(validateParentForm()){
            //     updateParentData(id);
            // }

        });
    });
    $('#parentSubmit').on('click', function () {
        // Get the ID of the clicked row
        var id = $(this).data('id');
        // Validate the form before submitting
        if (validateParentForm()) {
            // Add your code to submit the form or perform other actions
            // For example, you can call a function to handle the form submission
            updateParentData(id);
            // Optionally, you can close the modal or perform other actions
            $('#parentRecordModal').modal('hide');
        }
    });

    function validateParentForm() {
        // Get form inputs
        var name = $("#parent_nameUpdate").val();
        var email = $("#parent_emailUpdate").val();

        // Perform validation
        if (name.trim() === "") {
            alert("Name is required");
            return false;
        }

        if (email.trim() === "") {
            alert("Email is required");
            return false;
        }

        // Additional validation logic can be added as needed

        // If all validations pass, return true
        return true;
    }


    // Function to update parent data
    function updateParentData(id) {
        var parent_id = id;
        var email = $("#parent_emailUpdate").val();
        var Name = $("#parent_nameUpdate").val();
        $.ajax({
            type: "POST",
            url: "admin_updateParent.php",
            data: {
                id: parent_id,
                Name: Name,
                email: email,
            },
            success: function (response) {
                try {
                    var result = JSON.parse(response);
                    if (result.status === "Success") {
                        // Close the modal after successful update
                        $('#parentRecordModal').modal('hide');
                        // Update the corresponding row in the table with the returned data
                        updateTableRowParent(id, result.data);
                    } else {
                        console.error("Error updating data: ", result.message);
                    }
                } catch (error) {
                    console.error(error);
                }
            },
            error: function (error) {
                console.error("AJAX Error: ", error);
            }
        });
    }
    function showParent() {
        $('#parentRecord_table tbody').on('click', 'tr', function () {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "admin_fetchParent.php",
                data: {
                    id: id
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        $("#parent_nameUpdate").val(data.Name);
                        $("#parent_emailUpdate").val(data.email);
                        $("#parentSubmit").data('id', id);
                        if (!$('#parentRecordModal').data('deleteButtonAppended')) {
                            // Create a delete button dynamically
                            var deleteButton = document.createElement("button");
                            deleteButton.textContent = "Delete";
                            deleteButton.className = "btn btn-danger";
                            deleteButton.onclick = function () {
                                // Use the correct id when deleting
                                deleteParentData($("#parentSubmit").data('id'));
                                // Close the modal or perform other actions if needed
                                $('#parentRecordModal').modal('hide');
                            };

                            // Append the delete button to the modal content
                            $('#parentRecordModal .modal-content').append(deleteButton);

                            // Set the flag to indicate that the delete button has been appended
                            $('#parentRecordModal').data('deleteButtonAppended', true);
                        }
                        $('#parentRecordModal').modal('show');
                    } else {
                        console.error("Error fetching data: ", data.message);
                    }
                },
                error: function (error) {
                    console.error("AJAX Error: ", error);
                }
            });
        });
    }
    function deleteParentData(id) {
        $.ajax({
            type: "POST",
            url: "admin_deleteParent.php",
            data: {
                id: id
            },
            success: function (response) {
                try {
                    // Parse the JSON response
                    var result = JSON.parse(response);

                    // Check if the status is "Success"
                    if (result.status === "Success") {;
                        // Remove the corresponding row from the table
                        removeTableRowParent(id);
                        console.log("Row removed successfully.");
                    } else {
                        // Log or alert the error message
                        console.error("Error deleting data: ", result.message);
                    }
                } catch (error) {
                    // Handle JSON parsing error
                    console.error("Error parsing JSON: ", error);
                }
            },
            error: function (error) {
                // Handle AJAX errors
                console.error("AJAX Error: ", error);
            }
        });
    }
    // Function to update the HTML content of the table row
    function updateTableRowParent(id, data) {
        var $row = $("tr[data-id='" + id + "']");
        $row.find("td:eq(0)").text(data.name);
        $row.find("td:eq(1)").text(data.email);
    }
    function removeTableRowParent(id) {
        // Find the row with the matching data-id attribute and remove it
        var $row = $("#parentRecord_table tbody tr[data-id='" + id + "']");

        if ($row.length > 0) {
            $row.remove();
        } else {
            console.error("Row not found for ID:", id);
        }
    }
    //faculty


    // Attach the click event listener for the "Save" button when the modal is shown
    $('#facultyRecordModal').on('shown.bs.modal', function () {
        document.getElementById("facultySubmit").addEventListener("click", function (event) {
            // Get the ID of the clicked row
            var id = $(this).data('id');
            // if(validateFacultyForm()){
            //     updateFacultyData(id);
            // }

        });
    });
    $('#facultySubmit').on('click', function () {
        // Get the ID of the clicked row
        var id = $(this).data('id');
        // Validate the form before submitting
        if (validateFacultyForm()) {
            // Add your code to submit the form or perform other actions
            // For example, you can call a function to handle the form submission
            updateFacultyData(id);
            // Optionally, you can close the modal or perform other actions
            $('#facultyRecordModal').modal('hide');
        }
    });
    function updateFacultyData(id) {
        var fac_id = id;
        var email = $("#prof_emailUpdate").val();
        var Name = $("#prof_nameUpdate").val();
        $.ajax({
            type: "POST",
            url: "admin_updateFaculty.php",
            data: {
                id: fac_id,
                Name: Name,
                email: email,
            },
            success: function (response) {
                try {
                    var result = JSON.parse(response);
                    if (result.status === "Success") {
                        // Close the modal after successful update
                        $('#facultyRecordModal').modal('hide');
                        // Update the corresponding row in the table with the returned data
                        updateTableRowFaculty(id, result.data);
                    } else {
                        console.error("Error updating data: ", result.message);
                    }
                } catch (error) {
                    console.error(error);
                }
            },
            error: function (error) {
                console.error("AJAX Error: ", error);
            }
        });
    }

    // Function to delete faculty data
    function deleteFacultyData(id) {
        $.ajax({
            type: "POST",
            url: "admin_deleteFaculty.php",
            data: {
                id: id
            },
            success: function (response) {
                try {
                    // Parse the JSON response
                    var result = JSON.parse(response);

                    // Check if the status is "Success"
                    if (result.status === "Success") {
                
                        // Remove the corresponding row from the table
                        removeTableRowFaculty(id);
                        console.log("Row removed successfully.");
                    } else {
                        // Log or alert the error message
                        console.error("Error deleting data: ", result.message);
                    }
                } catch (error) {
                    // Handle JSON parsing error
                    console.error("Error parsing JSON: ", error);
                }
            },
            error: function (error) {
                // Handle AJAX errors
                console.error("AJAX Error: ", error);
            }
        });
    }

    function showFaculty() {
        $('#facultyRecord_table tbody').on('click', 'tr', function () {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "admin_fetchFaculty.php",
                data: {
                    id: id
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        $("#prof_nameUpdate").val(data.Name);
                        $("#prof_emailUpdate").val(data.email);
                        // Set data-id attribute to the Save button
                        $("#facultySubmit").data('id', id);
                        // Create delete button only if it doesn't exist
                        if (!$('#facultyRecordModal').data('deleteButtonAppended')) {
                            // Create a delete button dynamically
                            var deleteButton = document.createElement("button");
                            deleteButton.textContent = "Delete";
                            deleteButton.className = "btn btn-danger";
                            deleteButton.onclick = function () {
                                // Use the correct id when deleting
                                deleteFacultyData($("#facultySubmit").data('id'));
                                // Close the modal or perform other actions if needed
                                $('#facultyRecordModal').modal('hide');
                            };

                            // Append the delete button to the modal content
                            $('#facultyRecordModal .modal-content').append(deleteButton);

                            // Set the flag to indicate that the delete button has been appended
                            $('#facultyRecordModal').data('deleteButtonAppended', true);
                        }
                        $('#facultyRecordModal').modal('show');
                    } else {
                        console.error("Error fetching data: ", data.message);
                    }
                },
                error: function (error) {
                    console.error("AJAX Error: ", error);
                }
            });
        });
    }

    // Function to update the HTML content of the table row
    function updateTableRowFaculty(id, data) {
        // Find the row with the corresponding data-id attribute
        var $row = $("tr[data-id='" + id + "']");
        // Update the HTML content of the row with the new data
        $row.find("td:eq(0)").text(data.name);
        $row.find("td:eq(1)").text(data.email);
    }
    function removeTableRowFaculty(id) {
        // Find the row with the matching data-id attribute and remove it
        var $row = $("#facultyRecord_table tbody tr[data-id='" + id + "']");

        if ($row.length > 0) {
            $row.remove();
        } else {
            console.error("Row not found for ID:");
        }
    }
    function validateFacultyForm() {

        var name = $("#prof_nameUpdate").val();
        var email = $("#prof_emailUpdate").val();

        // Perform validation
        if (name.trim() === "") {
            alert("Name is required");
            return false;
        }

        if (email.trim() === "") {
            alert("Email is required");
            return false;
        }

        // Additional validation logic can be added as needed

        // If all validations pass, return true
        return true;
    }

    // Student
    function showModal() {
        var target = event.target;
        while (target.tagName !== "TR") {
            target = target.parentNode;
        }

        var id = target.getElementsByTagName("td")[0].innerText;
        if (!$('#studentRecordModal').data('deleteButtonAppended')) {
            // Create a delete button dynamically
            var deleteButton = document.createElement("button");
            deleteButton.textContent = "Delete";
            deleteButton.className = "btn btn-danger";
            deleteButton.onclick = function () {
                deleteStudentData(id);
                // Close the modal or perform other actions if needed
                $('#studentRecordModal').modal('hide');
            };

            // Append the delete button to the modal content
            $('#studentRecordModal .modal-content').append(deleteButton);

            // Set the flag to indicate that the delete button has been appended
            $('#studentRecordModal').data('deleteButtonAppended', true);
        }
        // Fetch data from the server based on the ID
        $.ajax({
            type: "POST",
            url: "admin_fetchStudent.php", // Create a new PHP file for fetching data
            data: {
                id: id
            },
            success: function (response) {
                // Parse the JSON response
                var data = JSON.parse(response);

                // Check if data is retrieved successfully
                if (data.success) {
                    // Fill the input fields with retrieved data
                    $("#name").val(data.Name);
                    $("#studid").val(data.studentId);
                    $("#sectionSelect").val(data.section);
                    $("#email").val(data.email);
                    $("#getUID").val(data.rfidTag);
                    $("#department").val(data.department);

                    // Show the modal
                    $('#studentRecordModal').modal('show');
                } else {
                    console.error("Error fetching data: ", data.message);
                }
            },
            error: function (error) {
                // Handle AJAX errors
                console.error("AJAX Error: ", error);
            }
        });
        $('#studentSubmit').on('click', function () {
        // Get the ID of the clicked row
        // Validate the form before submitting
        if (validateStudentForm()) {
            // Add your code to submit the form or perform other actions
            // For example, you can call a function to handle the form submission
            updateStudentData(id);
            // Optionally, you can close the modal or perform other actions
            $('#studentRecordModal').modal('hide');
        }
    });
        // Attach the click event to the submit button
        // document.getElementById("studentSubmit").addEventListener("click", function (event) {
        //     if (validateStudentForm()) {
                
        //     }
        // });
    }

    function validateStudentForm() {
        // Get form inputs
        var name = $("#name").val();
        var studid = $("#studid").val();
        var sectionSelect = $("#sectionSelect").val();
        var email = $("#email").val();
        var getUID = $("#getUID").val();

        // Perform validation
        if (name.trim() === "") {
            alert("Name is required");
            return false;
        }

        if (studid.trim() === "") {
            alert("Student Number is required");
            return false;
        }

        if (sectionSelect.trim() === "") {
            alert("Section is required");
            return false;
        }

        if (email.trim() === "") {
            alert("Email is required");
            return false;
        }

        if (getUID.trim() === "") {
            alert("Rfid Code is required");
            return false;
        }

        // Additional validation logic can be added as needed

        // If all validations pass, return true
        return true;
    }

    function updateStudentData(id) {
        var stud_id = id;
        var Name = $("#name").val();
        var studentId = $("#studid").val();
        var section = $("#sectionSelect").val();
        var email = $("#email").val();
        var rfidTag = $("#getUID").val();
        var department = $("#department").val();

        // Make an AJAX request to your PHP script
        $.ajax({
            type: "POST",
            url: "admin_updateStudent.php",
            data: {
                id: stud_id,
                Name: Name,
                studentId: studentId,
                section: section,
                department: department,
                email: email,
                rfidTag: rfidTag
            },
            success: function (response) {
                try {
                    // Parse the JSON response
                    var result = JSON.parse(response);
                    // Check if the status is "Success"
                    if (result.status === "Success") {
                        // Close the modal after successful update
                        $('#studentRecordModal').modal('hide');

                        // Update the corresponding row in the table with the returned data
                        updateTableRow(id, result.data);
                    } else {
                        // Log or alert the error message
                        console.error("Error updating data: ", result.message);
                    }
                } catch (error) {
                    // Handle JSON parsing error
                    console.error("Error parsing JSON: ", error);
                }
            },
            error: function (error) {
                // Handle AJAX errors
                console.error("AJAX Error: ", error);
            }
        });
    }

    function updateTableRow(id, data) {
        // Find the row with the matching ID in the table
        var row = $("#studentsRecord_table tbody tr:has(td:contains('" + id + "'))");

        // Update the data in the table row
        row.find("td:eq(1)").text(data.name);
        row.find("td:eq(2)").text(data.sectionid);
        row.find("td:eq(3)").text(data.department);
        
    }


    function deleteStudentData(id) {
        // Make an AJAX request to your PHP script for delete
        $.ajax({
            type: "POST",
            url: "admin_deleteStudent.php",
            data: {
                id: id
            },
            success: function (response) {
                try {
                    // Parse the JSON response
                    var result = JSON.parse(response);

                    // Check if the status is "Success"
                    if (result.status === "Success") {
                        // Remove the corresponding row from the table
                        removeTableRow(id);
                    } else {
                        // Log or alert the error message
                        console.error("Error deleting data: ", result.message);
                    }
                } catch (error) {
                    // Handle JSON parsing error
                    console.error("Error parsing JSON: ", error);
                }
            },
            error: function (error) {
                // Handle AJAX errors
                console.error("AJAX Error: ", error);
            }
        });
    }

    function removeTableRow(id) {
        // Find the row with the matching ID in the table and remove it
        $("#studentsRecord_table tbody tr:has(td:contains('" + id + "'))").remove();
    }




    function studentSelect() {
        document.getElementById("studentsRecord_table").addEventListener("click", showModal);
    }

    // Call the function when the document is ready
    $(document).ready(function () {
        studentSelect();
    });

    function addDiv() {
        var newDiv = $("<div>").addClass("child-div").html('<div id="child-div" style="display:flex;"><input type="number" id="parent_studid" name="parent_studid[]" class="form-control bg-transparent add_children" placeholder="Student Number" style="width:100%; border: 2px solid black; margin-bottom:10px;" min="0" max="9999999999" oninput="validateNumberInput(this);checkMaxLength(this, 10);"><input type="button" onclick="removediv(this)" class="btn btn-danger" value="x"></div>');
        $("#targetDiv").append(newDiv);
        $("#parent_submit").prop("disabled", false);
    }

    function removediv(deleteButton) {
        const parentDiv = deleteButton.parentNode.parentNode;
        parentDiv.remove();
        if ($("#targetDiv .child-div").length === 0) {
            $("#parent_submit").prop("disabled", true);
        }
    }

    function getInputValues() {
        var inputValues = [];
        $(".add_children").each(function () {
            inputValues.push($(this).val());
        });

        // Do something with the collected input values
        console.log(inputValues);
        var formattedArray = inputValues.join(' ');
        document.getElementById("children").value = formattedArray;
    }
    document.getElementById("create").addEventListener("click", getInputValues);


    function changeFunction() {
        var selectedValue = document.getElementById("sectionSelect").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "getdepartment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the response from the PHP script in the result container
                document.getElementById("department").value = xhr.responseText;
            }
        };

        // Send the selected value as POST data
        xhr.send("selectedValue=" + selectedValue);
    }

    function validateNumberInput(inputElement) {
        const inputValue = inputElement.value;
        const sanitizedValue = inputValue.replace(/[^0-9]/g, '');
        inputElement.value = sanitizedValue;
    }

    function checkMaxLength(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength); // Truncate the input value
        }
    }

    function submitFormStudent() {
        $('#confirmationModal').modal('show');
        document.getElementById("confirmButton").onclick = validationStudent;
    }

    function submitFormProf() {
        document.getElementById("confirmationBody").innerHTML = "Add this Professor Account";
        document.getElementById("exampleModalLabel").innerHTML = "Add Professor Account";
        $('#confirmationModal').modal('show');
        document.getElementById("confirmButton").onclick = validationProf;
    }

    function submitFormParent() {
        $('#parentModal').modal('show');
        document.getElementById("parentconfirmButton").onclick = validationParent;

    }

    function areAppendedInputsValid() {
        var valid = true;
        $(".add_children").each(function () {
            var studentNumber = $(this).val();
            if (studentNumber.length !== 10) {
                valid = false;
                return false; // Break the loop early since we found an invalid input
            }
        });
        return valid;
    }

    function validationParent() {
       
        const parent_fname = document.getElementById("parent_first_name");
        const parent_mname = document.getElementById("parent_middle_name");
        const parent_lname = document.getElementById("parent_last_name");
        var parent_studid = document.getElementById("parent_studid");
        const parent_email = document.getElementById("parent_email");
        var convertstudid = parent_studid.value.toString();
        var errorMessage;
        var emailGet = parent_email.value;
        var modalbodycontent = document.getElementById("Errormodalbody");
        var parentForm = document.getElementById("parentForm");

        if (parent_fname.validity.valid && parent_mname.validity.valid && parent_lname.validity.valid && parent_email.validity.valid) {
            if (convertstudid.length === 10 && areAppendedInputsValid()) {
                const formData = new FormData(parentForm);

                // Collect student numbers and add them to the formData
                var studentNumbers = [];
                $(".add_children").each(function () {
                    studentNumbers.push($(this).val());
                });
                formData.append("parent_studid", JSON.stringify(studentNumbers));

                fetch("add_parent.php", {
                    method: "POST",
                    body: formData,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        $('#parentModal').modal('hide');
                        if (data.success) {
                            // Handle success, e.g., show success message
                            document.getElementById("succmodalbody").innerHTML = "This Account is successfully added!";
                            $('#succModal').modal('show');

                            // Close modal or show success message
                            var subject = 'Email';
                            var message = 'Test Message';
                            var emailData = 'email=' + emailGet + '&subject=' + subject + '&message=' + message;
                            $.ajax({
                                type: 'POST',
                                url: 'sample_send_email.php',
                                data: emailData,
                                success: function (emailResponse) {
                                    console.log(emailResponse);
                                    if (emailResponse === 'success') {
                                        // Assuming you have modalContent and modalLabel defined in your HTML
                                    } else {
                                        // Handle email sending failure
                                        console.error("Email sending failed.");
                                    }
                                },
                            });
                            parentForm.reset();
                            const divRemover = document.getElementById('child-div');
                            divRemover.remove();
                        } else {
                            modalbodycontent.innerHTML = data.error;
                            $('#Errormodal').modal('show');
                        }
                    })
                    .catch((error) => {
                        modalbodycontent.innerHTML = "An error occurred:", error;
                        $('#Errormodal').modal('show');

                    });

            } else if (convertstudid.length <= 10) {
                parent_studid.setCustomValidity("Your student id must be a 10-digit number");
                errorMessage = "Invalid student ID.";
            } else {
                errorMessage = "Please fill in all required fields.";
            }
        } else {
            if (!parent_fname.validity.valid) {
                errorMessage = parent_fname.validationMessage + " (First Name)";
            } else if (!parent_mname.validity.valid) {
                errorMessage = parent_mname.validationMessage + " (Middle Name)";
            } else if (!parent_lname.validity.valid) {
                errorMessage = parent_lname.validationMessage + " (Last Name)";
            } else if (!parent_email.validity.valid) {
                errorMessage = parent_email.validationMessage + " (Email)";
            }
            modalbodycontent.innerHTML = errorMessage;
            $('#Errormodal').modal('show');
        }
    }


    function validationStudent() {
        $('#confirmationModal').modal('hide');
        const fname = document.getElementById("fname");
        const mname = document.getElementById("mname");
        const lname = document.getElementById("lname");
        const studid = document.getElementById("studid");
        const section = document.getElementById("sectionSelect");
        const email = document.getElementById("email");
        const rfid = document.getElementById("getUID");
        var modalbodycontent = document.getElementById("Errormodalbody");
        var errorMessage;
        myForm = document.getElementById("registrationForm");
        var convert = studid.value.toString();
        if (fname.validity.valid && mname.validity.valid && lname.validity.valid && section.validity.valid && email.validity.valid && rfid.validity.valid) {
            if (convert.length === 10 && studid.validity.valid) {
                const formData = new FormData(myForm);
                fetch("add_student.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => {
                        if (response.ok) {
                            document.getElementById("succmodalbody").innerHTML = "This Account is successfully added!";
                            $('#succModal').modal('show');
                            myForm.reset();
                            // Close modal or show success message
                        } else {

                            modalbodycontent.innerHTML = "Form submission failed.";
                            $('#Errormodal').modal('show');
                        }
                    })
                    .catch(error => {
                        modalbodycontent.innerHTML = "An error occurred:", error;
                        $('#Errormodal').modal('show');

                    });
            } else if (convert.length !== 10) {
                studid.setCustomValidity("Your student id must be a 10-digit number");
                errorMessage = "Invalid student ID.";
            } else {
                errorMessage = "Please fill in all required fields.";
            }
        } else {
            if (!fname.validity.valid) {
                errorMessage = fname.validationMessage + ("(First Name)");
            } else if (!mname.validity.valid) {
                errorMessage = mname.validationMessage + ("(Middle Name)");
            } else if (!lname.validity.valid) {
                errorMessage = lname.validationMessage + ("(Last Name)");
            } else if (!studid.validity.valid) {
                errorMessage = studid.validationMessage + ("(Student )");
            } else if (!section.validity.valid) {
                errorMessage = section.validationMessage + ("(Section)");
            } else if (!email.validity.valid) {
                errorMessage = email.validationMessage + ("(Email)");
            } else if (!rfid.value.trim()) {
                errorMessage = "RFID is required.";
            } else {

            }
            modalbodycontent.innerHTML = errorMessage;
            $('#Errormodal').modal('show');
        }




    }

    function validationProf() {
        $('#confirmationModal').modal('hide');
        const prof_fname = document.getElementById("prof_fname");
        const prof_mname = document.getElementById("prof_mname");
        const prof_lname = document.getElementById("prof_lname");
        const prof_email = document.getElementById("prof_email");
        const prof_Form = document.getElementById("professorForm");
        var modalbodycontent = document.getElementById("Errormodalbody");
        var errorMessage;
        var emailGet = prof_email.value;
        if (prof_fname.validity.valid && prof_mname.validity.valid && prof_lname.validity.valid && prof_email.validity.valid) {
            const formData = new FormData(prof_Form);
            fetch("add_faculty.php", {
                method: "POST",
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        // Handle success, e.g., show success message
                        document.getElementById("succmodalbody").innerHTML = "This Account is successfully added!";
                        $('#succModal').modal('show');

                        var subject = 'Email';
                        var message = 'Test Message';
                        var data = 'email=' + emailGet + '&subject=' + subject + '&message=' + message;
                        $.ajax({
                            type: 'POST',
                            url: 'sample_send_email.php',
                            data: data,
                            success: function (response) {
                                if (response === 'success') {
                                    sanaolLabel.textContent = "Success";
                                    modalbodycontent.innerHTML = "Your Account credential was send to your Email";
                                    $('#Errormodal').modal('show');
                                } else {

                                }
                            }
                        });
                    } else {
                        modalbodycontent.innerHTML = "Form submission failed.";
                        $('#Errormodal').modal('show');
                    }
                })
                .catch(error => {
                    modalbodycontent.innerHTML = "An error occurred:", error;
                    $('#Errormodal').modal('show');
                });
            prof_Form.reset();
        } else {
            if (!prof_fname.validity.valid) {
                errorMessage = prof_fname.validationMessage + " (First Name)";
            } else if (!prof_mname.validity.valid) {
                errorMessage = prof_mname.validationMessage + " (Middle Name)";
            } else if (!prof_lname.validity.valid) {
                errorMessage = prof_lname.validationMessage + " (Last Name)";
            } else if (!prof_email.validity.valid) {
                errorMessage = prof_email.validationMessage + " (Email)";
            } else {
                errorMessage = "Please fill in all required fields.";
            }
            modalbodycontent.innerHTML = errorMessage;
            $('#Errormodal').modal('show');
        }



    }
</script>

</html>