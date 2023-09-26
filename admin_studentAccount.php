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
        margin-left: 20%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label,
    input {
        align-self: flex-start;
    }

    #button {
        align-self: flex-end;
        background-color: #773535;
    }

    @media (max-width: 767px) {
        #container_pass {
            overflow-y: auto;
            height: 275px;
            width: 375px;
        }
    }
</style>
<form action="add_student.php" method="post" id="registrationForm">
    <div class="container" id="container_pass">
        CREATE ACCOUNT FOR STUDENTS
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column1">First Name</label>
                    <input type="text" class="form-control bg-transparent" name="first_name" required pattern="[A-Za-z ]{2,16}" id="fname"
                        placeholder="First Name" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column2">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" name="middle_name"required pattern="[A-Za-z ]{2,16}" id="mname"
                        placeholder="Middle Name" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column3">Last Name</label>
                    <input type="text" class="form-control bg-transparent" name="last_name"required pattern="[A-Za-z ]{2,16}" id="lname"
                        placeholder="Last Name" style="border: 2px solid black;">
                </div>
            </div>
            <!-- Second Row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column4">Student Number</label>
                    <input type="number" class="form-control bg-transparent" name="studentid" id="studid"
                        placeholder="Student Number" min="0" max="9999999999" oninput="validateNumberInput(this);checkMaxLength(this, 10);" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group text-white">
                    <label for="sectionSelect">Choose a Section:</label>
                    <select class="form-control bg-transparent" id="sectionSelect"
                        name="sectionid" onchange="changeFunction()" required style="width:100%; border: 2px solid black;">
                        <option value="" disabled selected hidden>Section</option>
                        <?php
                        include 'includes/session.php';
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
                        placeholder="Email" style="width:100%; border: 2px solid black;"required>
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column6">Rfid Code</label>
                    <textarea rows="1" name="rfidtag" id="getUID" class="form-control bg-transparent column6"
                        style="border: 2px solid black; resize:none;" placeholder="Please Tag your Card"
                        required readonly></textarea>
                </div>
            </div>
            <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
                <button type="button" class="btn btn-primary btn-block"  style="background-color: #773535" onclick="submitFormStudent()">
                   Create Account
                </button>
            </div>
        </div>
    </div>
</form>