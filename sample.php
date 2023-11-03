<?php
include 'includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href='cssCodes/main.css'>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Reference to the carousel element
        var carousel = document.getElementById("carouselExample");

        // Reference to the checkbox
        var checkbox = document.getElementById("disableCarousel");
        
        // Function to disable the carousel
        function disableCarousel() {
          $(carousel).carousel('pause'); // Pause the carousel
          carousel.style.pointerEvents = 'none'; // Disable user interaction with the carousel
        }

        // Function to enable the carousel
        function enableCarousel() {
          $(carousel).carousel(); // Start the carousel
          carousel.style.pointerEvents = 'auto'; // Enable user interaction with the carousel
        }

        // Add an event listener to the checkbox to toggle the carousel
        checkbox.addEventListener("change", function () {
          if (checkbox.checked) {
            disableCarousel();
          } else {
            enableCarousel();
          }
        });

        // Initialize the carousel
        $(carousel).carousel();
      });
    </script>
</head>

<body>
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        CREATE ACCOUNT FOR PARENTS
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column1">First Name</label>
                    <input type="text" class="form-control bg-transparent" name="first_name" id="parent_first_name"
                        placeholder="First Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column2">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" name="middle_name" id="parent_middle_name"
                        placeholder="Middle Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column3">Last Name</label>
                    <input type="text" class="form-control bg-transparent" name="last_name" id="parent_last_name"
                        placeholder="Last Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Email</label>
                    <input type="email" class="form-control bg-transparent" name="email" id="parent_email" placeholder="Email"
                        style="width:100%; border: 2px solid black;" required>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="form-group">
                    <label for="column5">Student Number</label>
                    <input type="number" min="0" max="9999999999" oninput="validateNumberInput(this);checkMaxLength(this, 10);" class="form-control bg-transparent " id="parent_student_number" placeholder="Student Number"
                        style="border: 2px solid black;" required>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="form-group">
                    <!-- <label for="column8">Contact Number</label>
                     <input type="text" class="form-control bg-transparent" id="parent_contact_number" placeholder="Contact Number"
                        style="width:100%; border: 2px solid black;"> --> 

                    <input type="text" class="form-control bg-transparent" name="children" id="children"
                        style="width:100%; border: 2px solid black;" hidden>
                </div>
            </div>
        </div>
        <div class="row" padding="">
            INPUT CHILD STUDENT NUMBER
            <div class="text-dark" id="targetDiv" style="padding:5px;">
            </div>
            <input type="button" class="btn btn-primary btn-block d-flex justify-content-center" id="btnAddDiv"
                value="Add Children" onclick="addDiv()" style="width:50%; margin-left:25%; background-color: #773535">
        </div>

        <!-- Add a button to trigger the function to get values -->
        <input type="button" class="btn btn-secondary" value="Verify Students">
        <p id="id">
        <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
             <!-- <button class="btn btn-primary btn-block" onclick="getInputValues()"
                style="background-color: #773535">Create Account</button>  -->
                <button type="button" class="btn btn-primary btn-block" id="parent_submit" onclick="submitFormParent();getInputValues()"
                style="background-color: #773535" disabled>Create Account</button>
        </div>
      </div>
      <div class="carousel-item">
      CREATE ACCOUNT FOR PARENTS
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column1">First Name</label>
                    <input type="text" class="form-control bg-transparent" name="first_name" id="parent_first_name"
                        placeholder="First Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column2">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" name="middle_name" id="parent_middle_name"
                        placeholder="Middle Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column3">Last Name</label>
                    <input type="text" class="form-control bg-transparent" name="last_name" id="parent_last_name"
                        placeholder="Last Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Email</label>
                    <input type="email" class="form-control bg-transparent" name="email" id="parent_email" placeholder="Email"
                        style="width:100%; border: 2px solid black;" required>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="form-group">
                    <label for="column5">Student Number</label>
                    <input type="number" min="0" max="9999999999" oninput="validateNumberInput(this);checkMaxLength(this, 10);" class="form-control bg-transparent " id="parent_student_number" placeholder="Student Number"
                        style="border: 2px solid black;" required>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="form-group">
                    <!-- <label for="column8">Contact Number</label>
                     <input type="text" class="form-control bg-transparent" id="parent_contact_number" placeholder="Contact Number"
                        style="width:100%; border: 2px solid black;"> --> 

                    <input type="text" class="form-control bg-transparent" name="children" id="children"
                        style="width:100%; border: 2px solid black;" hidden>
                </div>
            </div>
        </div>
        <div class="row" padding="">
            INPUT CHILD STUDENT NUMBER
            <div class="text-dark" id="targetDiv" style="padding:5px;">
            </div>
            <input type="button" class="btn btn-primary btn-block d-flex justify-content-center" id="btnAddDiv"
                value="Add Children" onclick="addDiv()" style="width:50%; margin-left:25%; background-color: #773535">
        </div>

        <!-- Add a button to trigger the function to get values -->
        <input type="button" class="btn btn-secondary" value="Verify Students">
        <p id="id">
        <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
             <!-- <button class="btn btn-primary btn-block" onclick="getInputValues()"
                style="background-color: #773535">Create Account</button>  -->
                <button type="button" class="btn btn-primary btn-block" id="parent_submit" onclick="submitFormParent();getInputValues()"
                style="background-color: #773535" disabled>Create Account</button>
        </div>
      </div>
     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

   
  </div>
  <div>
  <label for="disableCarousel">Disable Carousel</label>
    <input type="checkbox" id="disableCarousel">
  </div>
</body>
</html>
