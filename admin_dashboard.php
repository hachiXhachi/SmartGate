<?php
include 'includes/session.php';
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='cssCodes/main.css'>
    <script src="https://kit.fontawesome.com/613bb0837d.js" crossorigin="anonymous"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
    <style>
        .content {
            min-height: 100vh;
            width: 100%;
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        .input-container label {
            margin-right: 10px;
            /* Adjust the margin as needed */
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
            max-height: 100px;
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

        .under_sidebar3 {
            position: relative;
            max-height: 75px;
            width: auto;
            background-color: #545454;
            transition: all .2s ease;
        }

        .under_sidebar3.active {
            margin-bottom: 20px;
            transition: all .2s ease;
        }

        .under_sidebar3.d-none {
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

        #selectSection {
            display: none;
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

        #rfidContainer {
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
                Create this Parent account? For students:
                <div id="studentDetails"></div>
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
            <div class="modal-header" id="errorModalLabel">
                <h1 class="modal-title fs-5">Please fill out the fields Properly</h1>
                <button type="button" class="btn-close" id="close2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id=Errormodalbody>
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
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
                                    pattern="[A-Za-z ]{2,16}" id="nameModal" placeholder="Name"
                                    style="border: 2px solid black;">
                            </div>
                        </div>
                        <!-- Second Row -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="column4">Student Number</label>
                                <input type="number" class="form-control bg-transparent" name="studentid"
                                    id="studidModal" placeholder="Student Number" min="0" max="9999999999"
                                    oninput="validateNumberInput(this);checkMaxLength(this, 10);"
                                    style="border: 2px solid black;" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group text-white">
                                <label for="sectionSelectModal">Choose a Section:</label>
                                <select class="form-control bg-transparent" id="sectionSelectModal" name="sectionid"
                                    onchange="changeFunctionModal()" style="width:100%; border: 2px solid black;">
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
                                <input type="text" class="form-control bg-transparent" id="departmentModal"
                                    name="department" style="border: 2px solid black;" readonly>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="column7">Email</label>
                                <input type="email" class="form-control bg-transparent" name="schoolemail"
                                    id="emailModal" placeholder="Email" style="width:100%; border: 2px solid black;"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="column3">Year Level</label>
                                <input type="text" class="form-control bg-transparent" id="yrlevelModal" name="yrlevel"
                                    style="border: 2px solid black;" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="column6">RFID code</label>
                                <textarea rows="1" name="rfidtag" maxlength="12" id="getUIDModal"
                                    class="form-control bg-transparent column6"
                                    style="border: 2px solid black; resize:none;" placeholder="Please Tag your Card"
                                    readonly></textarea>
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
                <h5 class="modal-title" id="editModalLabel">Edit Professor Data</h5>
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
                <h5 class="modal-title" id="editModalLabel">Edit Parent Data</h5>
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
                    <div id="appendedInputs"></div>

            </div>
            <button type="button" id="parentSubmit" class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<!--add Section -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" style="font-family: arial;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Add Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSectionForm">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="add_sectionModalValue">Section</label>
                            <input type="text" class="form-control bg-transparent" id="add_sectionModalValue"
                                name="add_sectionModalValue" style="border: 2px solid black; text-transform: uppercase;"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="add_DepartmentModal">Department</label>
                            <input type="text" class="form-control bg-transparent" id="add_DepartmentModal"
                                name="add_DepartmentModal" style="border: 2px solid black; text-transform: uppercase;"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="year_level">Year level</label>
                            <select id="year_level" class="form-control" style="border: 2px solid black;" required>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="sectionSubmit" class="btn btn-primary">Save Changes</button>
                        <button type="submit" id="addSectionSubmitBtn" style="display: none;"></button>
                    </div>
            </div>

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
                <li class="active"><a id="home" class="text-decoration-none text-white d-block text-center py-2"
                        onclick="loadView('admin_home');hideSelect()">
                        <i class="fa-solid fa-house"></i> Home</a></li>
                <!-- ---------------------------------------------------- -->

                <hr class="h-color mx-4">
                <!--  ---------------------------------------------------- -->
                <li class="dropdown"><a class="text-decoration-none text-white d-block text-center py-2"
                        onclick="hideSelect()">
                        <i class="fa-solid fa-clipboard-user"></i> View Records</a>
                    <div class="under_sidebar d-none">
                        <ul class="list-unstyled">
                            <li><a id="student" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('adminRecord_students', studentSelect);hideSelect()">
                                    <i class="fa-solid fa-graduation-cap"></i> Student</a></li>

                            <li><a id="parent" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('adminRecord_parents', showParent);hideSelect()">
                                    <i class="fa-solid fa-users"></i> Parents</a></li>

                            <li><a id="prof" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('adminRecord_faculty', showFaculty);hideSelect()">
                                    <i class="fa-solid fa-person-chalkboard"></i> Professor</a></li>


                        </ul>
                    </div>
                </li>

                <hr class="h-color mx-4">
                <li class="dropdown2"><a class="text-decoration-none text-white d-block text-center py-2"
                        onclick="hideSelect()">
                        <i class="fa-solid fa-bell"></i> Create Account</a>
                    <div class="under_sidebar2 d-none">
                        <ul class="list-unstyled">
                            <li><a id="stdCreate" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_studentAccount');hideSelect()">
                                    <i class="fa-solid fa-graduation-cap"></i> Student</a></li>

                            <li><a id="prfCreate" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_proffesorAccount', generateProfPassword);hideSelect()">
                                    <i class="fa-solid fa-person-chalkboard"></i> Professor</a></li>
                            <li><a id="prCreate" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_parent', generateParentPassword);hideSelect()">
                                    <i class="fa-solid fa-user"></i> Parents</a></li>

                        </ul>
                    </div>

                </li>

                <hr class="h-color mx-4">
                <li class="dropdown3"><a class="text-decoration-none text-white d-block text-center py-2">
                        <i class="fa-solid fa-bell"></i> Operations</a>
                    <div class="under_sidebar3 d-none">
                        <ul class="list-unstyled">
                            <li><a id="archive" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_archiveRecords');hideSelect()">
                                    <i class="fa-solid fa-person-chalkboard"></i> Archive Records</a></li>
                            <li><a id="sectionUp" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_updateSection' );showSelect()">
                                    <i class="fa-solid fa-users"></i> Update Section</a></li>
                            <li><a id="sectionUp" class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_registerRfid' );hideSelect()">
                                    <i class="fa-solid fa-qrcode"></i></i> Register RFIDs</a></li>

                        </ul>
                    </div>

                </li>
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
        <div class="container mt-4" id="selectSection">
            <div class="form-group" id="insideDiv" style="position:relative; left:10%;width:60%;">
                <select id="dropdown4" value="All" onChange="searchFilter();">
                    <option id="allQuery">All</option>
                </select>
            </div>
        </div>
    </div>
    <div class="base position-absolute top-50 start-50 translate-middle text-white" id="base">
        <div class="cotainer position-absolute top-50 start-50 translate-middle text-white" id="container"
            style="font-family:sans-serif;display: flex;align-items: center;justify-content: center;">
            <img src="assets/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
            <div class="text-white">
                <h2>Welcome, ADMIN
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

<script>
    var index = 0;
    var data = [];
    var clicked = false;
    function fetchAndDisplayData() {
        clicked = true;
        index = 0;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                displayDataItem(index);
                document.getElementById("nextRfid").disabled = false;
            }
        };
        xhttp.open("GET", "admin_fetchRfid.php", true);
        xhttp.send();
    }

    function displayDataItem(i) {
        if (i < data.length && clicked) {
            var currentItem = data[i];
            var resultDiv = document.getElementById("result");
            resultDiv.innerHTML = "<h3>Student ID: " + currentItem.ID + "</h3><br> <h3>Name: " + currentItem.Name + "</h3><br><h3> Email: " + currentItem.Email+"<h3>";

            var inputField = document.createElement("textarea");
            inputField.type = "textarea";
            inputField.value = currentItem.rfid;
            inputField.rows = "1";
            inputField.className = "form-control";
            inputField.id = "getUID";
            inputField.style = "resize:none; text-align: center";
            inputField.placeholder = "---> TAP RFID CARD <---";
            //inputField.readOnly = "true";
            inputField.addEventListener("blur", function () {
                updateRFID(currentItem.ID, inputField.value, function () {
                    document.getElementById("nameSpan").innerText = inputField.value;
                });
            });

            resultDiv.appendChild(inputField);
            document.getElementById("nextRfid").disabled = false;
        } else {
            document.getElementById("result").innerHTML = "All students have RFID tags registered.";
        }
    }

    function updateRFID(studentID, rfidtags, callback) {
        // Make an AJAX request to the server-side script (admin_rfidUpdate.php in this case)
        var updateXhttp = new XMLHttpRequest();
        updateXhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Execute the callback function after the update is complete
                callback();
            }
        };
        updateXhttp.open("GET", "admin_rfidUpdate.php?studentID=" + studentID + "&rfid=" + rfidtags, true);
        updateXhttp.send();
    }

    function proceedToNext() {
        // Proceed to the next data item
        index++;
        displayDataItem(index);
    }
    function addSection() {
        $('#addSectionModal').modal('show');

        document.getElementById("sectionSubmit").addEventListener("click", function () {
            var addSectionModalValue = $("#add_sectionModalValue").val();
            var addDepartmentMdal = $("#add_DepartmentModal").val();
            var yrLvlModal = $("#year_level").val();

            // Check if the form is valid
            if ($("#addSectionForm")[0].reportValidity()) {
                $.ajax({
                    type: "POST",
                    url: "add_section.php",
                    data: {
                        addSectionModalValue: addSectionModalValue,
                        addDepartmentMdal: addDepartmentMdal,
                        yrLvlModal: yrLvlModal
                    },
                    complete: function (jqXHR, textStatus) {
                        var response = jqXHR.responseText;
                        var data = JSON.parse(response);

                        if (textStatus === "success") {
                            // Handle the success response
                            console.log(response);
                            if (data.success) {
                                alert("Section added!");
                                $("#addSectionForm")[0].reset();
                            } else {
                                alert("Error: " + data.error);
                            }
                        }

                        $('#addSectionModal').modal('hide');
                    }
                });
            }
        });
    }



    function getCheckedCheckboxIds() {
        var checkedCheckboxes = document.querySelectorAll('.delete-checkbox:checked');
        var sectionIds = [];

        checkedCheckboxes.forEach(function (checkbox) {
            sectionIds.push(checkbox.dataset.sectionId);
        });

        if (sectionIds.length > 0) {
            // Confirm with the user before deleting
            var confirmation = confirm('Are you sure you want to delete the selected rows?');

            if (confirmation) {
                // Send an AJAX request to delete the selected rows
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'deleteRows.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    // Check the response from the server
                    if (xhr.status === 200) {
                        // Show success message
                        alert('Rows deleted successfully');

                        // Update the UI as needed (remove deleted rows)
                        checkedCheckboxes.forEach(function (checkbox) {
                            checkbox.closest('tr').remove();
                        });
                    } else {
                        // Show error message
                        alert('Error deleting rows');
                    }
                };
                xhr.send('sectionIds=' + sectionIds.join(','));
            }
        } else {
            alert('No sections are selected.');
        }
    }
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        var sectionSearch = $('#dropdown4').val(); // Get the selected section value
        $.ajax({
            type: 'POST',
            url: 'getSection.php',
            data: {
                page: page_num,
                sectionSearch: sectionSearch
            },
            beforeSend: function () {
                $('.loading-overlay').show();
            },
            success: function (html) {
                $('#dataContainer').html(html);
                $('.loading-overlay').fadeOut("slow");
            }
        });
    }
    function showSelect() {
        document.getElementById("selectSection").style.display = "block";
    }
    function hideSelect() {
        document.getElementById("selectSection").style.display = "none";
    }
    $(document).ready(function () {
        var selectizeControl = $('#dropdown4').selectize({
            create: false,
            sortField: 'text',
            value: 'All',
        });

        // Function to fetch data from the database using PHP with a POST request
        function fetchDataFromDatabase() {
            $.ajax({
                url: 'yrLevelSearch.php', // Replace with the actual PHP script URL
                method: 'POST', // Use POST method
                dataType: 'json',
                success: function (data) {
                    // Update the options in the Selectize dropdown
                    var selectize = selectizeControl[0].selectize;
                    selectize.clearOptions();
                    data.forEach(function (item) {
                        selectize.addOption({ value: item.value, text: item.value });
                    });
                    $('#sectionUp').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    $('#archive').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    $('#prCreate').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    $('#stdCreate').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    $('#prof').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    $('#parent').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    $('#student').click(function () {
                        // Set the value of the Selectize input to "all"
                        selectize.setValue('All');
                    });
                    selectize.refreshOptions();
                },
                error: function (error) {
                    console.error('Error fetching data: ', error);
                }
            });
        }

        // Call the function to fetch data from the database
        fetchDataFromDatabase();

    });
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
        $('.under_sidebar3').addClass('d-none');
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
    $('.dropdown3').on('click', function () {
        $('.under_sidebar3').removeClass('d-none');
        $('.under_sidebar3').addClass('active');;
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
        } else {
            alert("Invalid");
        }
    });

    function validateParentForm() {
        // Get form inputs
        var name = $("#parent_nameUpdate").val();
        var email = $("#parent_emailUpdate").val();

        // Perform validation for name and email
        if (name.trim() === "") {
            alert("Name is required");
            return false;
        }

        if (email.trim() === "") {
            alert("Email is required");
            return false;
        }

        // Perform validation for dynamically appended input fields (existing student IDs)
        var isValid = true;
        $("input[name^='studentId']").each(function () {
            var studentId = $(this).val();

            // Perform validation for each existing student ID
            if (studentId.trim() === "") {
                alert("Student ID is required");
                isValid = false;
                return false; // Break the loop early if an invalid student ID is found
            }

            // Add additional validation logic for existing student IDs if needed
        });

        // Validate the new student ID only if it is present
        var newStudentIds = $("input[name^='newStudentId']").map(function () {
            return $(this).val().trim();
        }).get();

        if (newStudentIds.length > 0) {
            for (var i = 0; i < newStudentIds.length; i++) {
                if (newStudentIds[i] === "") {
                    isValid = false;
                    break;
                }
            }
        }

        return isValid;
    }


    // Function to update parent data
    function updateParentData(id) {
        var parent_id = id;
        var email = $("#parent_emailUpdate").val();
        var Name = $("#parent_nameUpdate").val();
        var newStudentIds = [];
        $("input[name^='newStudentId']").each(function () {
            var newStudentId = $(this).val();
            if (newStudentId.trim() !== "") {
                newStudentIds.push(newStudentId);
            }
        });


        $.ajax({
            type: "POST",
            url: "admin_updateParent.php",
            data: {
                id: parent_id,
                Name: Name,
                email: email, // Pass the array of student IDs to PHP
                newStudentIds: newStudentIds // Pass the new student ID to PHP
            },
            success: function (response) {
                try {
                    var result = JSON.parse(response);
                    if (result.status === "Success") {
                        // Close the modal after a successful update
                        alert("Success");
                        $('#parentRecordModal').modal('hide');

                        // Update the corresponding row in the table with the returned data
                        updateTableRowParent(id, result.data);
                    } else {
                        alert(result.data);
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

                        // Clear existing appended inputs
                        $('#appendedInputs').empty();

                        // Create labels for existing appended inputs
                        var studentIds = data.studentIds; // Assuming you have this property in your JSON response
                        for (var i = 0; i < studentIds.length; i++) {
                            createAppendedInput(i, studentIds[i], id);
                        }

                        // Append button for adding new input if it doesn't exist
                        if (!$('#parentRecordModal').data('AddButtonAppended')) {
                            // Append button for adding new input
                            var addButton = document.createElement("button");
                            addButton.textContent = "Add Student ID";
                            addButton.className = "btn btn-primary";
                            addButton.type = "button";
                            addButton.name = "addStudentIdButton";
                            addButton.onclick = function () {
                                addAppendedInput();
                            };
                            $('#parentRecordModal .modal-content').append(addButton);
                            $('#parentRecordModal').data('AddButtonAppended', true);
                        }

                        if (!$('#parentRecordModal').data('deleteButtonAppended')) {
                            // Create a delete button dynamically
                            var deleteButton = document.createElement("button");
                            deleteButton.textContent = "Delete";
                            deleteButton.className = "btn btn-danger";
                            deleteButton.onclick = function () {
                                // Use the correct id when deleting
                                var confimationDelete = confirm("are you sure you want to delete this?");

                                if (confimationDelete) {
                                    deleteParentData($("#parentSubmit").data('id'));
                                    $('#parentRecordModal').modal('hide');
                                }
                                // Close the modal or perform other actions if needed

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

    function createAppendedInput(index, value, id) {
        // Create a container div for each input and button
        var container = document.createElement("div");
        container.className = "input-container";
        var passParentId = id;
        // Create label
        var label = document.createElement("label");
        label.textContent = "Student ID " + (index + 1) + ":";
        label.style = "font-size:12px;"
        container.appendChild(label);
        // Create input
        var input = document.createElement("input");
        input.type = "number";
        input.className = "form-control bg-transparent";
        input.name = "studentId" + (index + 1);
        input.value = value;
        input.style = "border: 2px solid black;";
        input.readOnly = true;
        container.appendChild(input);

        // Create delete button
        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.className = "btn btn-danger";
        deleteButton.type = "button";
        deleteButton.onclick = function () {
            // Call a function to confirm deletion and perform deletion if confirmed
            confirmAndDelete(value, passParentId);
        };
        container.appendChild(deleteButton);

        // Append the container to the main container
        $('#appendedInputs').append(container);
    }


    function confirmAndDelete(studentId, passParentId) {
        var confirmation = confirm("Are you sure you want to delete this data?");

        if (confirmation) {
            // Perform AJAX request to delete the row in childtv with the provided studentId
            deleteChildTvRow(studentId, passParentId);
        }
    }

    function deleteChildTvRow(studentId, passParentId) {
        // Perform AJAX request to delete the row in childtv
        $.ajax({
            type: "POST",
            url: "deleteChildTvRow.php", // Adjust the URL to your PHP script
            data: {
                passParentId: passParentId,
                studentId: studentId
            },
            success: function (response) {
                var result = JSON.parse(response);
                // Handle success, e.g., remove the corresponding input field from the UI
                if (result.status === "Success") {
                    alert("Deleted");
                    $('#parentRecordModal').modal('hide');
                }
            },
            error: function (error) {
                // Handle error
                console.error("AJAX Error: ", error);
            }
        });
    }


    function addAppendedInput() {
        // Create container div for the new input and button
        var container = document.createElement("div");
        container.className = "input-container";

        // Create label for the new input
        var newLabel = document.createElement("label");
        newLabel.textContent = "New Student ID:";
        container.appendChild(newLabel);

        // Create and append input field
        var input = document.createElement("input");
        input.type = "number";
        input.className = "form-control bg-transparent";
        input.name = "newStudentId"; // Modify as needed
        input.style = "border: 2px solid black;";
        input.addEventListener("input", function (event) {
            validateNumberInput(this);
        });
        input.addEventListener("input", function (event) {
            checkMaxLength(this, 10);
        });
        container.appendChild(input);

        // Create delete button
        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.className = "btn btn-danger";
        deleteButton.type = "button";
        deleteButton.onclick = function () {
            // Call a function to confirm deletion and perform deletion if confirmed
            container.remove();
        };
        container.appendChild(deleteButton);

        // Append the container to the main container
        $('#appendedInputs').append(container);
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
                    if (result.status === "Success") {
                        alert("Deleted!");
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
                        alert("Success");
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
                        alert("Deleted");
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
    $('#studentSubmit').on('click', function () {
        // Get the ID of the clicked row
        var id = $('#studentSubmit').data('id');

        // Validate the form before submitting
        if (validateStudentForm()) {
            // Add your code to submit the form or perform other actions
            // For example, you can call a function to handle the form submission
            updateStudentData(id);
            // Optionally, you can close the modal or perform other actions
            $('#studentRecordModal').modal('hide');
        }
    });

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
                deleteStudentData($('#studentSubmit').data('id'));
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

                var data = JSON.parse(response);

                // Check if data is retrieved successfully
                if (data.success) {
                    // Fill the input fields with retrieved data
                    $("#nameModal").val(data.Name);
                    $("#studidModal").val(data.studentId);
                    $("#sectionSelectModal").val(data.section);
                    $("#emailModal").val(data.email);
                    $("#yrlevelModal").val(data.year_level);
                    $("#getUIDModal").val(data.rfidTag);
                    $("#departmentModal").val(data.department);

                    // Set the data-id attribute for later use
                    $('#studentSubmit').data('id', id);

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
    }


    function validateStudentForm() {
        // Get form inputs
        var name = $("#nameModal").val();
        var studid = $("#studidModal").val();
        var sectionSelect = $("#sectionSelectModal").val();
        var email = $("#emailModal").val();
        var getUID = $("#getUIDModal").val();

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
        var Name = $("#nameModal").val();
        var studentId = $("#studidModal").val();
        var section = $("#sectionSelectModal").val();
        var email = $("#emailModal").val();
        var yrlvl = $("#yrlevelModal").val();
        var rfidTag = $("#getUIDModal").val();
        var department = $("#departmentModal").val();

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
                yrlvl: yrlvl,
                rfidTag: rfidTag
            },
            success: function (response) {
                var result = JSON.parse(response);
                try {
                    // Check if the status is "Success"
                    if (result.status === "Success") {
                        // Close the modal after successful update
                        alert("Success");
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
                        alert("Deleted");
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
                // Parse the JSON response
                var response = JSON.parse(xhr.responseText);

                // Update both the Department and Year Level textboxes
                document.getElementById("department").value = response.department;
                document.getElementById("yrlevel").value = response.year_level;
            }
        };

        // Send the selected value as POST data
        xhr.send("selectedValue=" + selectedValue);
    }

    
    function changeFunctionModal() {
        var selectedValue = document.getElementById("sectionSelectModal").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "getdepartment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Parse the JSON response
                var response = JSON.parse(xhr.responseText);

                // Update both the Department and Year Level textboxes
                document.getElementById("departmentModal").value = response.department;
                document.getElementById("yrlevelModal").value = response.year_level;
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
        var studentNumbers = [];
        $(".add_children").each(function () {
            studentNumbers.push($(this).val());
        });

        var modalContent = $('#studentDetails');
        var parentConfirmButton = $("#parentconfirmButton");

        // AJAX call
        $.ajax({
            type: "POST",
            url: "check_students.php", // Replace with the correct path to your PHP file
            data: { studentNumbers: studentNumbers },
            success: function (response) {
                // Handle the response from the server
                var data = JSON.parse(response);
                var allExistInDatabase = true; // Flag to track if all student IDs exist in the database

                if (data.status === 'success') {
                    // Clear previous content
                    modalContent.empty();

                    // Loop through the input student numbers
                    $.each(studentNumbers, function (index, studentNumber) {
                        // Check if the current student number exists in the response data
                        var student = data.data.find(function (s) {
                            return s.studentid === studentNumber;
                        });

                        if (student) {
                            // If found, append student details to the modal
                            modalContent.append('<b>Student ID:</b> ' + student.studentid + ' <b>Name:</b> ' + student.name + '<br>');
                        } else {
                            // If not found, indicate that the data does not exist
                            modalContent.append('<b>Student ID:</b> ' + studentNumber + ' <b>Data does not exist</b><br>');
                            allExistInDatabase = false; // Set the flag to false
                        }
                    });

                    // Enable or disable the parent confirm button based on the flag
                    parentConfirmButton.prop('disabled', !allExistInDatabase);

                    $('#parentModal').modal('show');
                    document.getElementById("parentconfirmButton").onclick = validationParent;
                } else {
                    // Handle error case
                    modalContent.empty();
                    modalContent.append("Error: " + data.message);
                    parentConfirmButton.prop('disabled', true); // Disable the button in case of an error
                    $('#parentModal').modal('show');
                }
            },
            error: function () {
                // Handle AJAX error
                alert("Error: Unable to communicate with the server");
            }
        });
    }

    function downloadCsv() {

        var sampleCSV = "section_name,department_name,year_level";

        // Create a Blob and download it
        var blob = new Blob([sampleCSV], { type: 'text/csv' });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'sample.csv';
        link.click();
    }
    function addCsv() {
        var modalbodycontent = document.getElementById("Errormodalbody");
        var h1Element = document.querySelector('#Errormodal .modal-title');
        h1Element.innerText = 'Uploading';
        document.getElementById("close").disabled = "true";
        document.getElementById("close").disabled = "true";
        modalbodycontent.innerHTML = "Uploading please wait...";
        $('#Errormodal').modal('show');
        var fileInput = document.getElementById('file');
        var file = fileInput.files[0];
        if (file) {
            var formData = new FormData();
            formData.append('file', file);

            fetch('uploadSection.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    $('#Errormodal').modal('hide');
                    document.getElementById("succmodalbody").innerHTML = "Success";
                    $('#succModal').modal('show');
                })
                .catch(error => {
                    console.error('Error:', error);
                    modalbodycontent.innerHTML = error;
                    $('#Errormodal').modal('show');
                });
        } else {
            modalbodycontent.innerHTML = "Please add a file";
            $('#Errormodal').modal('show');
        }
    }

    function areAppendedInputsValid() {
        var valid = true;
        $(".add_children").each(function () {
            var studentNumber = $(this).val();
            if (studentNumber.length !== 10 && studentNumber == "") {
                valid = false;
                return false; // Break the loop early since we found an invalid input
            }
        });
        return valid;
    }

    //Random password generator to use for account creation
    function generateRandomPassword(length) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let password = "";

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }

        return password;
    }

    function generateProfPassword() {
        const randomPassword = generateRandomPassword(7);
        document.getElementById("prof_password").value = randomPassword;
    }
    function generateParentPassword() {
        const randomPassword = generateRandomPassword(7);
        document.getElementById("parent_password").value = randomPassword;
    }
    //Random password generator to use for account creation

    function validationParent() {
        const parent_fname = document.getElementById("parent_first_name");
        const parent_mname = document.getElementById("parent_middle_name");
        const parent_lname = document.getElementById("parent_last_name");
        var parent_studid = document.getElementById("parent_studid");
        const parent_email = document.getElementById("parent_email");
        var parent_password = document.getElementById("parent_password").value;
        var convertstudid = parent_studid.value.toString();
        var errorMessage;
        var emailGet = parent_email.value;
        var modalbodycontent = document.getElementById("Errormodalbody");
        var parentForm = document.getElementById("parentForm");

        if (parent_fname.validity.valid && parent_mname.validity.valid && parent_lname.validity.valid && parent_email.validity.valid) {
            if (convertstudid.length === 10 && areAppendedInputsValid()) {
                var subject = 'BulSU - Sarmiento Campus SmartGate';
                var message = `
Greetings!,

This is to inform you that we have created a BulSU SmartGate Parent account for you.
Below are your account details and a link for our Android application.

Your Login Credentials:
Username/Email: ${emailGet}
Password: ${parent_password} (You can change this password after logging in for the first time.)

Important Note: We highly recommend changing your password after the initial login for enhanced security.

Download SmartGate for Android:
Please see the link below to get the APK file for SmartGate.
https://we.tl/t-ZK42n4YnCl  

For assistance, kindly message [MIS]

This is an automatically generated email - please do not reply to this email
`;
                var emailData = 'email=' + emailGet + '&subject=' + subject + '&message=' + message;
                $.ajax({
                    type: 'POST',
                    url: 'sample_send_email.php',
                    data: emailData,
                    success: function (emailResponse) {
                        console.log(emailResponse);
                        if (emailResponse === 'success') {
                            alert("Email was send successfully");
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
                                        parentForm.reset();
                                        const divRemover = document.getElementById('child-div');
                                        divRemover.remove();
                                    } else {
                                        modalbodycontent.innerHTML = data.error;
                                        $('#Errormodal').modal('show');
                                    }
                                })
                                .catch((error) => {
                                    console.log(response.error);
                                    modalbodycontent.innerHTML = "An error occurred:", error;
                                    $('#Errormodal').modal('show');

                                });

                        } else if (emailResponse === "Email Not Existing") {
                            alert("Email is not Existing");
                        } else {
                            var confirmation = confirm("Email sending failed");
                            if (confirmation) {
                                resendEmail(data);
                            }
                        }
                    },
                });

            } else if (convertstudid.length <= 10) {
                parent_studid.setCustomValidity("Your student id must be a 10-digit number");
                errorMessage = "Invalid student ID.";
                modalbodycontent.innerHTML = errorMessage;
                $('#Errormodal').modal('show');
            } else {
                errorMessage = "Please fill in all required fields.";
                modalbodycontent.innerHTML = errorMessage;
                $('#Errormodal').modal('show');
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
        var rfid = document.getElementById("getUID");

        const modalbodycontent = document.getElementById("Errormodalbody");
        let errorMessage;

        const convert = studid.value.toString();

        if (!fname.validity.valid) {
            errorMessage = fname.validationMessage + " (First Name)";
        } else if (!mname.validity.valid) {
            errorMessage = mname.validationMessage + " (Middle Name)";
        } else if (!lname.validity.valid) {
            errorMessage = lname.validationMessage + " (Last Name)";
        } else if (!section.validity.valid) {
            errorMessage = section.validationMessage + " (Section)";
        } else if (!email.validity.valid) {
            errorMessage = email.validationMessage + " (Email)";
        } else if (!rfid.validity.valid) {
            errorMessage = "RFID is required.";
        } else if (!studid.validity.valid) {
            errorMessage = studid.validationMessage + " (Student Number)";
        } else if (convert.length !== 10) {
            errorMessage = "Your student id must be a 10-digit number";
        } else {
            const formData = new FormData(document.getElementById("registrationForm"));

            fetch("add_student.php", {
                method: "POST",
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        document.getElementById("succmodalbody").innerHTML = "This Account is successfully added!";
                        $('#succModal').modal('show');
                        $("#getUID").val('');
                        document.getElementById("registrationForm").reset();

                    } else {
                        modalbodycontent.innerHTML = "Form submission failed.";
                        $('#Errormodal').modal('show');
                    }
                })
                .catch(error => {
                    modalbodycontent.innerHTML = "An error occurred: " + error;
                    $('#Errormodal').modal('show');
                });

            return;
        }

        modalbodycontent.innerHTML = errorMessage;
        $('#Errormodal').modal('show');
    }


    function validationProf() {
        $('#confirmationModal').modal('hide');
        const prof_fname = document.getElementById("prof_fname");
        const prof_mname = document.getElementById("prof_mname");
        const prof_lname = document.getElementById("prof_lname");
        const prof_email = document.getElementById("prof_email");
        var prof_password = document.getElementById("prof_password").value;
        const prof_Form = document.getElementById("professorForm");
        var modalbodycontent = document.getElementById("Errormodalbody");
        var errorMessage;
        var emailGet = prof_email.value;
        if (prof_fname.validity.valid && prof_mname.validity.valid && prof_lname.validity.valid && prof_email.validity.valid) {

            var subject = 'BulSU - Sarmiento Campus SmartGate';
            var message = `
Greetings!,

This is to inform you that we have created a BulSU SmartGate Professor account for you.
Below are your account details.

Your Login Credentials:
Username/Email: ${emailGet}
Password: ${prof_password} (You can change this password after logging in for the first time.)

Important Note: We highly recommend changing your password after the initial login for enhanced security.

For assistance, kindly message [MIS]

This is an automatically generated email - please do not reply to this email
`;
            var data = 'email=' + emailGet + '&subject=' + subject + '&message=' + message;
            $.ajax({
                type: 'POST',
                url: 'sample_send_email.php',
                data: data,
                success: function (response) {
                    if (response === 'success') {
                        alert("Email was send successfully");
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
                    } else if (response === "Email Not Existing") {
                        alert("Email is not Existing");
                    } else {
                        var confirmation = confirm("Email sending failed");
                        if (confirmation) {
                            resendEmail(data);
                        }
                    }
                }
            });
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
    function resendEmail(email) {
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
                    alert("email was not send");
                }
            }
        });
    }
</script>

</html>