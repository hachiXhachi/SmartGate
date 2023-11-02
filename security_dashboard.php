<?php
include 'includes/session.php';
$studentData = array(
  'studentid' =>"Not Exist" ,
  'name' =>"Not Exist",
  'sectionid' => "Not Exist",
  'department' => "Not Exist",

);
$jsonData = json_encode($studentData);

// Create the content for 'security_dashboard.php'
$phpContent = $jsonData;

// Write the content to 'security_dashboard.php'
file_put_contents('getstudentData.php', $phpContent);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <title>Faculty</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='cssCodes/main.css'>
  <script src="https://kit.fontawesome.com/613bb0837d.js" crossorigin="anonymous"></script>
  <style>
    .content {
      min-height: 100vh;
      width: 100%;
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

    #side_nav.active {
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
      background-color: #929292;
    }

    #side_form {
      margin-left: 5%;
      display: flex;
      flex-direction: column;
      align-items: right;

    }

    #base {
      width: 100%;
      margin: 0 auto;
    }

    .notification_container {
      max-height: 100%;
      overflow-y: auto;
      max-width: 100%;
      width: auto;
      height: 400px;
      background-color: #545454;
      font-family: sans-serif;
    }

    .child-div {
      background-color: #f0f0f0;
      border: 1px solid #ddd;
      border-radius: 25px;
      padding: 10px;
      margin: 10px;
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

<body id="background-image-dashboard">

  <div class="content">
    <nav class="navbar navbar-expand-lg bg-transparent">
      <div class="container-fluid">
        <div class="navbar-brand d-flex justify-content-between d-block "
          style="display: flex;align-items: center;justify-content: center;margin-left:5%;">
          <button class="btn d-block px-1 py-0 open-btn text-white" id="logout_button"><i
              class="fa-solid fa-bars-staggered"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="image">
            <img src="assets/bulsu_icon.png" class="image img-fluid" style="width:85px; margin-right: 20px;">
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
    <div class="container position-absolute top-50 start-50 translate-middle text-white" id="container"
      style="font-family:sans-serif;display: flex;align-items: center;justify-content: center;">
      <img src="assets/icon_email.jpg" class="img-fluid" width="100" alt="profile">
      <div class="text-white">
      </div>
      <div id="side_form">
      <h3 id="name">Name</h3>
      <h3 id="studid">Student ID</h3>
      <h3 id="section">Section</h3>
      <h3 id="dpartment">Department</h3>
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
                <img src="assets/Kaypian.png" alt="Logo" width="30" class="d-inline-block align-text-center">
                Kaypian, San Jose Del Monte Bulacan
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">
                <img src="assets/contact.png" alt="Logo" width="30" class="d-inline-block align-text-center">
                912-123-1234
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">
                <img src="assets/email.png" alt="Logo" width="30" class="d-inline-block align-text-center">
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
    var jsonData; // Variable to store the parsed JSON data

    // Function to fetch and update the JSON data
    function updateData() {
        $.get("getstudentData.php", function (data) {
            jsonData = JSON.parse(data);

            // Now you can access the JSON data in the 'jsonData' variable
            var studentId = jsonData.studentid;
            var name = jsonData.name;
            var sectionId = jsonData.sectionid;
            var department = jsonData.department;

            // Update the HTML elements with the new data
            document.getElementById("name").innerHTML = "Student ID: " + name;
            document.getElementById("studid").innerHTML = "Name: " + studentId;
            document.getElementById("section").innerHTML = "Section ID: " + sectionId;
            document.getElementById("dpartment").innerHTML = "Department: " + department;

        });
    }

    // Initial data load
    updateData();

    // Set an interval to periodically update the JSON data
    setInterval(updateData, 500);
});

</script>

</html>