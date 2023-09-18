
<style>
    #container_pass {
      max-height: 400px;
      width: 100%;
      background-color: #545454;
      font-family: sans-serif;
      padding: 105px;
      padding-top: 50px;
      padding-bottom: 50px;
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
    CREATE asdasdasda ACCOUNT FOR STUDENTS
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
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column4">Student Number</label>
                    <input type="text" class="form-control bg-transparent" id="column4" placeholder="Student Number" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column5">Section</label>
                    <input type="text" class="form-control bg-transparent" id="column5" placeholder="Section" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column6">Rfid Code</label>
                    <textarea rows="1" name="id" id="getUID" class="form-control bg-transparent column6" style="border: 2px solid black; resize:none;" placeholder="Please Tag your Card"
                        required></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Address</label>
                    <input type="text" class="form-control bg-transparent" id="column7" placeholder="Address" style="width:100%; border: 2px solid black;">
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column8">Contact Number</label>
                    <input type="text" class="form-control bg-transparent" id="column7" placeholder="Contact Number" style="width:100%; border: 2px solid black;">
                </div>
            </div>
            <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
                <button class="btn btn-primary btn-block" style="background-color: #773535">Create Account</button>
            </div>
        </div>
    </div>
</form>
 
 