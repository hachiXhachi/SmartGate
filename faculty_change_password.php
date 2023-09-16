<style>
    #container_pass {
      max-height: 400px;
      max-width: 600px;
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
  <div class="container" id="container_pass">
    <div style="display: flex;align-items: center;justify-content: center; margin-bottom:10px;">
      <img src="icons/icon_email.jpg" class="img-fluid" width="70" alt="profile" style="margin-right: 10%;">
      <div class="text-white">
        <h5>Jian Kyle Albaro 
          <br>
        </h5>
        <h6>BSIT Department</h6>             
      </div>
    </div>
    <div class="form-group centered-form-group">
      <label for="current_pass">Current Password</label>
      <input type="text" class="form-control bg-transparent" id="current_pass" style="width: 50%; border: 2px solid black;">
      <label for="new_pass">New Password</label>
      <input type="text" class="form-control bg-transparent text-dark" id="new_pass" style="width: 50%; border: 2px solid black;">
      <label for="retype_pass">Re-type Password</label>
      <input type="text" class="form-control bg-transparent" id="retype_pass" style="width: 50%; border: 2px solid black;">
      <button class="btn btn-outline-dark" id="button" style="border:3px solid black; color: #A0ABAA;">S A V E</button>
    </div>
  </div>

