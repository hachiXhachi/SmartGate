<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typeable Dropdown with Search</title>

  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
</head>
<body style="background-color:black;">
    <div class="container mt-4">
        <h2>Typeable Dropdown with Search</h2>
        <div class="form-group">
            <select id="dropdown"></select>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#dropdown').selectize({
                create: false, 
                sortField: 'text',
                placeholder: 'Type to search or select...'
            });

            // Add options to the Selectize dropdown
            const selectize = $('#dropdown')[0].selectize;
            selectize.addOption([
                { value: 'Option 1', text: 'Option 1' },
                { value: 'Option 2', text: 'Option 2' },
                { value: 'Option 3', text: 'Option 3' },
                { value: 'Option 4', text: 'Option 4' },
                { value: 'Option 5', text: 'Option 5' },
                { value: 'Option 6', text: 'Option 6' },
            ]);
        });
    </script>
</body>
</html>
