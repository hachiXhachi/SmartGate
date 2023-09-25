<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='src/main.css'>
    <script src="https://kit.fontawesome.com/613bb0837d.js" crossorigin="anonymous"></script>
    <style>
        .content {
            min-height: 100vh;
            width: 100%;
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
<div class="modal fade" id="confirmationModal" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family:arial">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Student Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Create this Account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="confirmButton" onclick="submitForm()">Add Account</button>
            </div>
        </div>
    </div>
</div>
<body id="background-image-dashboard">
    <div class="main-container d-flex" style="font-family: sans-seriff;">
        <div class="sidebar d-mb-none" id="side_nav">
            <div class="header-box px-3 pt-3 pb-4 py-2 d-flex justify-content-between">
                <img src="icons/logo_sarmiento.png" width="40" class="img-fluid"> &nbsp;
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
                                    onclick="loadView('sample')">
                                    <i class="fa-solid fa-graduation-cap"></i> Student</a></li>

                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_home')">
                                    <i class="fa-solid fa-users"></i> Parents</a></li>

                            <li><a class="text-decoration-none text-white d-block text-center "
                                    onclick="loadView('admin_home')">
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
                <button type="button" class="btn tn btn-outline-secondary text-white px-5"
                    style="border: 2px solid black; border-radius: 5px;">Log-out</button>
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
                            <img src="icons/bulsu_icon.png" class="image img-fluid"
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
            <img src="icons/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
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
                                <img src="icons/Kaypian.png" alt="Logo" width="30"
                                    class="d-inline-block align-text-center">
                                Kaypian, San Jose Del Monte Bulacan
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="#">
                                <img src="icons/contact.png" alt="Logo" width="30"
                                    class="d-inline-block align-text-center">
                                912-123-1234
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="#">
                                <img src="icons/email.png" alt="Logo" width="30"
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
        $('.sidebar').addClass('d-mb-none');
        ;
    });
    $('.dropdown').on('click', function () {
        $('.under_sidebar').removeClass('d-none');
        $('.under_sidebar').addClass('active');
        ;
    });
    $('.dropdown2').on('click', function () {
        $('.under_sidebar2').removeClass('d-none');
        $('.under_sidebar2').addClass('active');

        ;
    });

    function loadView(viewName) {
        fetch(`${viewName}.php`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('base').innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading view:', error);
            });
    }
    function addDiv() {
        var newDiv = $("<div>").addClass("child-div").html('<input type="text" class="form-control bg-transparent add_children" placeholder="Student Number" style="width:100%; border: 2px solid black; margin-bottom:10px;" required>');
        $("#targetDiv").append(newDiv);
    }






    function getInputValues() {
        var inputValues = [];
        // Iterate through all input elements with type="text"
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
   
    function submitForm() {
        myForm = document.getElementById("registrationForm");
        if(myForm.checkValidity()){
            myForm.submit();    
        }else{
            alert("Please fill out all required fields");
        }
        
    }
</script>

</html>