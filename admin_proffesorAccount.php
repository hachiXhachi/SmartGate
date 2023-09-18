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
<form action="" method="post">
    <div class="container" id="container_pass">
        CREATE ACCOUNT FOR STUDENTS
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column1">First Name</label>
                    <input type="text" class="form-control bg-transparent" id="column1" placeholder="First Name"
                        style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column2">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" id="column2" placeholder="Middle Name"
                        style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column3">Last Name</label>
                    <input type="text" class="form-control bg-transparent" id="column3" placeholder="Last Name"
                        style="border: 2px solid black;">
                </div>
            </div>
            <!-- Second Row -->
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Email</label>
                    <input type="text" class="form-control bg-transparent" id="column7" placeholder="Email"
                        style="width:100%; border: 2px solid black;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group text-white">
                    <label for="sectionSelect">Choose a Section:</label>
                    <select class="form-control" id="sectionSelect" name="section">
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
            <div class="col-md-4" >
                <div class="form-group">
                    <label for="column3">Department</label>
                    <input type="text" class="form-control bg-transparent" id="department" name="department"
                        style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Contact Number</label>
                    <input type="text" class="form-control bg-transparent" id="column7" placeholder="Contact Number"
                        style="width:100%; border: 2px solid black;">
                </div>
            </div>

            <div style="display: flex;justify-content: flex-end;margin-top: 10px; ">
                <button class="btn btn-primary btn-block" style="background-color: #773535">Create Account</button>
            </div>
        </div>
    </div>
</form>
<script>
     document.addEventListener("DOMContentLoaded", function () {
        const dropdown = document.getElementById("sectionSelect");
        const selectedText = document.getElementById("department");

        // Add an event listener to the dropdown
        dropdown.addEventListener("change", function () {
            selectedText.textContent = "Selected: " + dropdown.options[dropdown.selectedIndex].text;
            // <?php
            // include 'includes/session.php';
            // $sectiondrop = $_POST['section'];
            // $stmt = $con->prepare("SELECT department_name from section_tbl where section_name=:sectiondrop");
            // $stmt->bindParam(':sectiondrop', $sectiondrop);
            // $stmt->execute();
            // $row = $stmt->fetch();
            // $department = $row['section_department'];
            // ?>
            //selectedText.value=dropdown;
            
        });
    });
</script>
<?
$conn = null;
?>