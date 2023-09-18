<style>
    #container_pass {
        max-height: 400px;
        width: 100%;
        background-color: #545454;
        font-family: sans-serif;
        padding: 20px;
        overflow-y: auto;
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
<form action="add_parent.php" method="post">
    <div class="container" id="container_pass">
        CREATE ACCOUNT FOR PARENTS
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column1">First Name</label>
                    <input type="text" class="form-control bg-transparent" name="first_name" id="column1"
                        placeholder="First Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column2">Middle Name</label>
                    <input type="text" class="form-control bg-transparent" name="middle_name" id="column2"
                        placeholder="Middle Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column3">Last Name</label>
                    <input type="text" class="form-control bg-transparent" name="last_name" id="column3"
                        placeholder="Last Name" style="border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="column7">Email</label>
                    <input type="text" class="form-control bg-transparent" name="email" id="column7" placeholder="Email"
                        style="width:100%; border: 2px solid black;" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column5">Student Number</label>
                    <input type="text" class="form-control bg-transparent" id="column5" placeholder="Student Number"
                        style="border: 2px solid black;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="column8">Contact Number</label>
                    <input type="text" class="form-control bg-transparent" id="column8" placeholder="Contact Number"
                        style="width:100%; border: 2px solid black;">

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
            <button class="btn btn-primary btn-block" onclick="getInputValues()"
                style="background-color: #773535">Create Account</button>
        </div>
    </div>
</form>