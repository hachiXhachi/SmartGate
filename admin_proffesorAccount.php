
<style>
    #container_pass {
      max-height: 400px;
      width: 100%;
      background-color: #545454;
      font-family: sans-serif;
      padding: 20px; 
    }
    .centered-form-group {
      margin-left:20% ;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    label,input{
        align-self: flex-start;
    }
    #button{
        align-self: flex-end;
        background-color: #773535;
    }

    @media (max-width: 767px){
        #container_pass {
            overflow-y: auto;
            height: 275px;
            width: 375px;
        }
    }
    
  </style>
  <form action="" method="post">
    <div class="container" id="container_pass">
    CREATE ACCOUNT FOR STUDENTS
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column1">First Name</label>
                    <input type="text" class="form-control bg-transparent" id="column1" placeholder="First Name"  style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column2">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" id="column2" placeholder="Middle Name" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column3">Last Name</label>
                    <input type="text" class="form-control bg-transparent" id="column3" placeholder="Last Name" style="border: 2px solid black;">
                </div>
            </div>
            <!-- Second Row -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Email</label>
                    <input type="text" class="form-control bg-transparent" id="column7" placeholder="Email" style="width:100%; border: 2px solid black;">
                </div>
            </div>
            <div class="col-lg-12">
            <div class="col-md-4">
        <div class="form-group text-white">
            <label for="sectionSelect">Choose a Section:</label>
            <select class="form-control bg-transparent" id="sectionSelect" name="section" style="width:100%; border: 2px solid black;">
                <?php
                include 'includes/session.php';
                $sql = "SELECT section_name FROM section_tbl";
                $stmt = $con->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option>' . $row['section_name'] . '</option>';
                }
                $conn = null;
                ?>
            </select>
        </div>
    </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Contact Number</label>
                    <input type="text" class="form-control bg-transparent" id="column7" placeholder="Contact Number" style="width:100%; border: 2px solid black;">
                </div>
            </div>
   
            <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
                <button class="btn btn-primary btn-block" style="background-color: #773535">Create Account</button>
            </div>
        </div>
    </div>
  </form>
 
 