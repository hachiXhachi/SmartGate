<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <title>Faculty</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='cssCodes/main.css'>
  <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
    rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
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

    tr,
    table,
    td,
    th {
      border: 2px solid black;
    }

    #tball {
      max-height: 300px;
      overflow-y: auto;
      max-width: 100%;
      width: auto;
    }

    @media (max-width: 767px) {
      #tball {
        height: 300px;
      }
    }
  </style>
  <script>
    function searchFilter(page_num) {
      page_num = page_num ? page_num : 0;
      var sectionSearch = $('#dropdown').val(); // Get the selected section value
      $.ajax({
        type: 'POST',
        url: 'getData.php',
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

  </script>
</head>



<!-- change pass Modal -->
<div class="modal fade" id="parentChangepassModal" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true"
  style="font-family:arial">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="parentChangepassModalLabel">Change Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="parentConfirmationPassBody">
        Create this Parent Account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="PasswordConfirmButton"
          data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Attendance record modal -->
<div class="modal fade" id="attendanceRecordModal" tabindex="5" aria-labelledby="exampleModalLabel" aria-hidden="true"
  style="font-family:arial">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="attendanceRecordModalLabel">Student Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="recordBody">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<body id="background-image-dashboard">
  <div class="main-container d-flex" style="font-family: sans-seriff;">
    <div class="sidebar d-mb-none" id="side_nav">
      <div class="header-box px-3 pt-3 pb-4 py-2 d-flex justify-content-between">
        <img src="assets/logo_sarmiento.png" width="40" class="img-fluid"> &nbsp;
        <h5 class="text-white py-1 px-2">Faculty Dashboard</h5>
        <button class="btn d-block px-1 py-0 close-btn text-white"><i class="fa-solid fa-bars-staggered"></i></button>
      </div>
      <hr class="h-color mx-4">
      <ul class="list-unstyled px-5 py-3">
        <li class="active"><a class="text-decoration-none text-white d-block text-center py-2"
            onclick="loadView('faculty_home');hideSelect()" id="home"><i class="fa-solid fa-house"></i> Home</a></li>
        <hr class="h-color mx-4">
        <li><a class="text-decoration-none text-white d-block text-center py-2"
            onclick="loadView('faculty_attendance');showSelect()" id="attend"><i class="fa-solid fa-clipboard-user"></i>
            View
            Attendance</a></li>
        <!-- <hr class="h-color mx-4">
        <li><a class="text-decoration-none text-white d-block text-center py-2"
            onclick="loadView('faculty_notification');hideSelect()" id="notif"><i class="fa-solid fa-bell"></i>
            Notification
            Tab</a></li> -->
        <hr class="h-color mx-4">
        <li><a class="text-decoration-none text-white d-block text-center py-2"
            onclick="loadView('faculty_change_password');hideSelect()" id="pass"><i class="fa-solid fa-key"></i> Change
            Password</a></li>
      </ul>
      <div class="text-center py-5">
        <button type="button" id="logout_button" class="btn tn btn-outline-secondary text-white px-5"
          style="border: 2px solid black; border-radius: 5px;">Logout</button>
      </div>
    </div>
    <div>

    </div>

    <div class="content">
      <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
          <div class="navbar-brand d-flex justify-content-between d-block "
            style="display: flex;align-items: center;justify-content: center;margin-left:5%;">
            <button class="btn d-block px-1 py-0 open-btn text-white"><i
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
    <div class="container mt-4" id="selectSection">
      <div class="form-group" id="insideDiv" style="position:relative; left:10%;width:60%;">
        <select id="dropdown" value="All" onChange="searchFilter();">
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
        <?php
        echo "<h3>" . $user['name'] . "</h3>";
        echo "<h6>" . $user['email'] . "</h6>";
        ?>
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


<script>

  $(".sidebar ul li").on('click', function () {
    $(".sidebar ul li.active").removeClass('active');
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
  $('.close-btn').on('click', function () {
    $('.sidebar').removeClass('active');
    $('.sidebar').addClass('d-mb-none');
    ;
  });
  function loadView(viewName) {
    document.getElementById('dropdown').value = "All";
    fetch(`${viewName}.php`)
      .then(response => response.text())
      .then(data => {
        document.getElementById('base').innerHTML = data;

        // Attach click event to each row inside the #base element
        $('#base').on('click', '#attendance_list tr', function () {
          var studentId = $(this).data('student-id');
          var studentName = $(this).data('student-name');
          showAttendanceModal(studentId,studentName);
        });
      })
      .catch(error => {
        console.error('Error loading view:', error);
      });
  }
  function showAttendanceModal(studentId,studentName) {
  // Use AJAX to fetch attendance records for the selected student
  $.ajax({
    type: 'POST',
    url: 'fetch_attendance.php', // Replace with the actual URL to fetch attendance records
    data: { studentId: studentId },
    dataType: 'json',
    success: function (data) {
      
      // Build the HTML to display attendance records
      var modalBody = document.getElementById('recordBody');
      var htmlContent = '<h3>Attendance Records for Student: ' + studentName + '</h3>';

      if (data.length > 0) {
        htmlContent += '<table class="table table-bordered">';
        htmlContent += '<thead><tr><th>Date</th><th>Time-in</th><th>Time-out</th></tr></thead>';
        htmlContent += '<tbody>';

        // Iterate through the attendance records and add rows to the table
        for (var i = 0; i < data.length; i++) {
          htmlContent += '<tr>';
          htmlContent += '<td>' + data[i].date + '</td>';
          htmlContent += '<td>' + data[i].time_in + '</td>';
          htmlContent += '<td>' + data[i].time_out + '</td>';
          htmlContent += '</tr>';
        }

        htmlContent += '</tbody></table>';
      } else {
        htmlContent += '<p>No attendance records found for this student.</p>';
      }

      // Set the modal body's innerHTML
      modalBody.innerHTML = htmlContent;

      // Show the modal
      $('#attendanceRecordModal').modal('show');
    },
    error: function (xhr, status, error) {
      console.error('Error fetching attendance records:', error);
    }
  });
}


  // function calculateTotalDays(studentId) {
  //     var uniqueDays = [];

  //     // Iterate through each row in the table
  //     $('#attendance_list tr').each(function() {
  //         var rowStudentId = $(this).data('student-id');

  //         // Check if the row corresponds to the selected student
  //         if (rowStudentId == studentId) {
  //             // Get the date value
  //             var dateString = $(this).find('td:eq(0)').text(); // Assuming date is in the 1st column

  //             // Extract day from the date
  //             var dayOfWeek = moment(dateString, 'MM-DD-YYYY').format('dddd');

  //             // Add the unique day to the array
  //             if (!uniqueDays.includes(dayOfWeek)) {
  //                 uniqueDays.push(dayOfWeek);
  //             }
  //         }
  //     });

  //     // Display the total number of unique days
  //     var totalDays = uniqueDays.length;

  //     alert('Total days for the week: ' + totalDays);
  // }



  $(document).ready(function () {
    var selectizeControl = $('#dropdown').selectize({
      create: false,
      sortField: 'text',
      value: 'All',
    });

    // Function to fetch data from the database using PHP with a POST request
    function fetchDataFromDatabase() {
      $.ajax({
        url: 'searchSection.php', // Replace with the actual PHP script URL
        method: 'POST', // Use POST method
        dataType: 'json',
        success: function (data) {
          // Update the options in the Selectize dropdown
          var selectize = selectizeControl[0].selectize;
          selectize.clearOptions();
          data.forEach(function (item) {
            selectize.addOption({ value: item.value, text: item.value });
          });
          $('#home').click(function () {
            // Set the value of the Selectize input to "all"
            selectize.setValue('All');
          });
          $('#attend').click(function () {
            // Set the value of the Selectize input to "all"
            selectize.setValue('All');
          });
          $('#notif').click(function () {
            // Set the value of the Selectize input to "all"
            selectize.setValue('All');
          });
          $('#pass').click(function () {
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

  function myFunction() {
    var newDiv = $("<div>").addClass("child-div").text("Student enter the school premises");
    $("#targetDiv").append(newDiv);
  }
  function showSelect() {
    document.getElementById("selectSection").style.display = "block";
  }
  function hideSelect() {
    document.getElementById("selectSection").style.display = "none";
  }
  function logoutFunction() {
    window.location.href = 'logout.php';
  }
  document.getElementById("logout_button").addEventListener("click", logoutFunction);

  function submitFormFaculty() {
    var currentPass = $('#current_pass').val();
    var newPass = $('#new_pass').val();
    var retypePass = $('#retype_pass').val();
    var PasswordForm = document.getElementById("changePasswordForm");
    var modalbodycontentPass = document.getElementById("parentConfirmationPassBody");
    var PasswordConfirmButton = document.getElementById("PasswordConfirmButton");
    if (PasswordForm.checkValidity()) {
      $.ajax({
        type: 'POST',
        url: 'change_password.php',
        data: {
          current_pass: currentPass,
          new_pass: newPass,
          retype_pass: retypePass
        },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            // alert(response.message);
            // window.location.href = 'parents_dashboard.php';
            modalbodycontentPass.innerHTML = response.message;
            $('#parentChangepassModal').modal('show');
            PasswordConfirmButton.value = "Confirm";
            $('#current_pass').val('');
            $('#new_pass').val('');
            $('#retype_pass').val('');
          } else {
            modalbodycontentPass.innerHTML = response.message;
            $('#parentChangepassModal').modal('show');
          }
        }
      });
    } else {
      modalbodycontentPass.innerHTML = "Please fill out the fields properly";
      $('#parentChangepassModal').modal('show');
    }

  }
</script>

</html>