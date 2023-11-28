<style>
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
</style>
<div class="notification_container text-dark">
    <div class="form-group centered-form-group" style="width:50%;">
        <h2>Student Record Upload</h2>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Student CSV</label>
            <input type="file" name="file" id="file" accept=".csv" required class="form-control">
        </div>
        <button onclick="addCsv()" id="button" class="btn btn-success">Upload</button>
        <button onclick="downloadCsv()" class="btn btn-success" style="align-self: flex-end;">Download Sample CSV</button>
        <div id="result"></div>
    </div>
</div>

