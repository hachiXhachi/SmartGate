<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <title>Faculty</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='src/main.css'>
  <script src="https://kit.fontawesome.com/613bb0837d.js" crossorigin="anonymous"></script>
  <style>
    .content {
      min-height: 100vh;
      width: 100%;
    }

    #side_nav {
      position:fixed;
      height: 100vh;
      min-width: 270px;
      max-width: 300px;
      background-color: #773535;
      transition: all .2s ease; 
      z-index:1;
    }
    #side_nav.active{
        margin-left:0;
        transition: all .2s ease; 
      }
    #side_nav.d-mb-none{
        margin-left: -270px;
        position:fixed;
        min-height:100vh;
        z-index:1;
      }
    hr, .h-color {
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
			padding-top:25px;
			padding-left:25px;
			padding-right:25px;
			padding-bottom:50px; 
  		background-color: rgb(84,84,84);
		}
    #base {
  		width: 100%;
  		margin: 0 auto; 
		}
    .notification_container{
            max-height:100%;
             overflow-y: auto; 
             max-width:100%;
             width:auto;
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
      #side_nav{
        margin-left: -270px;
        position:fixed;
        min-height:100vh;
        z-index:1;
      }
      #side_nav.active{
        margin-left:0;
      }
      h2{
				font-size: 20px;
			}
			h4{
				font-size: 15px;
			}
      .image{
				width: 50px;
        margin-right: 5px;
			}
      .table-container{
        max-height: 300px;
      }
    }
  
  </style>
</head>

<body id="background-image-dashboard">
  <div class="main-container d-flex" style="font-family: sans-seriff;">
    <div class="sidebar d-mb-none" id="side_nav">
      <div class="header-box px-3 pt-3 pb-4 py-2 d-flex justify-content-between">
        <img src="icons/logo_sarmiento.png" width="40" class="img-fluid"> &nbsp;
        <h5 class="text-white py-1 px-2">Parents Dashboard</h5>
        <button class="btn d-block px-1 py-0 close-btn text-white"><i class="fa-solid fa-bars-staggered"></i></button>
      </div>
      <hr class="h-color mx-4">
      <ul class="list-unstyled px-5 py-3">
      <li class="active"><a class="text-decoration-none text-white d-block text-center py-2" onclick="loadView('faculty_home')"><i class="fa-solid fa-house"></i> Home</a></li>
        <hr class="h-color mx-4">
        <li><a class="text-decoration-none text-white d-block text-center py-2" onclick="loadView('faculty_attendance')"><i class="fa-solid fa-clipboard-user"></i> View Attendance</a></li>
        <hr class="h-color mx-4">
        <li><a class="text-decoration-none text-white d-block text-center py-2" onclick="loadView('faculty_notification')"><i class="fa-solid fa-bell"></i> Notification Tab</a></li>
        <hr class="h-color mx-4">
        <li><a class="text-decoration-none text-white d-block text-center py-2"  onclick="loadView('faculty_change_password')"><i class="fa-solid fa-key"></i> Change Password</a></li>
      </ul>
      <div class="text-center py-5">
      <button type="button" class="btn tn btn-outline-secondary text-white px-5" style="border: 2px solid black; border-radius: 5px;">Log-out</button>
      </div>
    </div>
    <div class="content">
      <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
          <div class="navbar-brand d-flex justify-content-between d-block " style="display: flex;align-items: center;justify-content: center;margin-left:5%;">
          <button class="btn d-block px-1 py-0 open-btn text-white"><i class="fa-solid fa-bars-staggered"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="image">
            <img src="icons/bulsu_icon.png" class="image img-fluid" style="width:85px; margin-right: 20px;">
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
    <div class="cotainer position-absolute top-50 start-50 translate-middle text-white" id="container" style="font-family:sans-serif;display: flex;align-items: center;justify-content: center;">
      <img src="icons/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
      <div class="text-white">
              <h2>Jian Kyle Albaro 
                <br>
              </h2>
              <h5>jiankyle.albaro.d@bulsu.edu.ph</h5>             
            </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg fixed-bottom" style="font-family: sans-seriff;" >
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Contact Us</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">
                <img src="icons/Kaypian.png" alt="Logo" width="30" class="d-inline-block align-text-center">
                Kaypian, San Jose Del Monte Bulacan
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">
                <img src="icons/contact.png" alt="Logo" width="30" class="d-inline-block align-text-center">
                912-123-1234
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">
                <img src="icons/email.png" alt="Logo" width="30" class="d-inline-block align-text-center">
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
  
  $(".sidebar ul li").on('click', function() {
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');

  });
  $('.open-btn').on('click', function(){
    $('.sidebar').addClass('active');
    $('.sidebar').removeClass('d-mb-none');
    
   

  });
  $('.close-btn').on('click', function(){
    $('.sidebar').removeClass('active');
    $('.sidebar').addClass('d-mb-none');
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
    function myFunction() {
      var newDiv = $("<div>").addClass("child-div").text("Student enter the school premises");
      $("#targetDiv").append(newDiv);
    }

</script>

</html>