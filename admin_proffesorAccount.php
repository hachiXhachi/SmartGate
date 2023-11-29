<style>
    #container_pass {
        max-height: 400px;
        width: 100%;
        background-color: #545454;
        font-family: sans-serif;
        padding: 20px;
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
<form method="post" id="professorForm">
    <div class="container" id="container_pass">
        CREATE ACCOUNT FOR PROFESSOR
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_fname">First Name</label>
                    <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}"
                        id="prof_fname" name="first_name" placeholder="First Name" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_mname">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" pattern="[A-Za-z ]{2,16}" id="prof_mname"
                        name="middle_name" placeholder="Middle Name" style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_lname">Last Name</label>
                    <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}"
                        id="prof_lname" name="last_name" placeholder="Last Name" style="border: 2px solid black;">
                </div>
            </div>
            <!-- Second Row -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="prof_email">Email</label>
                    <input type="email" class="form-control bg-transparent" id="prof_email" name="email"
                        placeholder="Email" style="width:100%; border: 2px solid black;" required>
                </div>
                <div class="col-md-4">
                    <div class="form-group text-white">
                        <label for="departmentSelect">Department</label>
                        <select class="form-control bg-transparent" id="departmentSelect" name="departmentid"
                            onchange="changeFunction()" style="width:100%; border: 2px solid black;" required>
                            <option value="" disabled selected hidden>Department</option>
                            <?php
                            include 'includes/session.php';
                            $sql = "SELECT DISTINCT department_name FROM section_tbl";
                            $stmt = $con->query($sql);

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $departmentName = $row['department_name'];
                                echo '<option id="option">' . $departmentName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control bg-transparent" id="prof_password" name="password"
                        placeholder="Password" style="width:100%; border: 2px solid black;" hidden>
                </div>
            </div>

            <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
                <button type="button" class="btn btn-primary btn-block" style="background-color: #773535"
                    onclick="submitFormProf()">Create Account</button>
            </div>
        </div>
    </div>
</form>
<?
$conn = null;
?>