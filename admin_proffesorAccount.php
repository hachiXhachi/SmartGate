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
<form action="" method="post" id ="professorForm">
    <div class="container" id="container_pass">
        CREATE ACCOUNT FOR PROFESSOR
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_fname">First Name</label>
                    <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}" id="prof_fname" placeholder="First Name"
                        style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_mname">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}" id="prof_mname" placeholder="Middle Name"
                        style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_lname">Last Name</label>
                    <input type="text" class="form-control bg-transparent" required pattern="[A-Za-z ]{2,16}" id="prof_lname" placeholder="Last Name"
                        style="border: 2px solid black;">
                </div>
            </div>
            <!-- Second Row -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="prof_email">Email</label>
                    <input type="email" class="form-control bg-transparent" id="prof_email" placeholder="Email"
                        style="width:100%; border: 2px solid black;" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group text-white">
                    <label for="sectionSelect">Choose a Section:</label>
                    <select class="form-control bg-transparent" id="sectionSelect" name="sectionSelectprof"
                        onchange="changeFunction()"required style="width:100%; border: 2px solid black;" >
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
                    <label for="department">Department</label>
                    <input type="text" class="form-control bg-transparent" id="department" name="department_prof"
                        style="border: 2px solid black;" readonly>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Contact Number</label>
                    <input type="text" class="form-control bg-transparent" id="contact_number" placeholder="Contact Number"
                        style="width:100%; border: 2px solid black;">
                </div>
            </div> -->

            <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
                <button type="button" class="btn btn-primary btn-block" style="background-color: #773535" onclick="submitFormProf()">Create Account</button>
            </div>
        </div>
    </div>
</form>
<?
$conn = null;
?>