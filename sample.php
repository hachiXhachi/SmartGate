<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='src/main.css'>
<script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function addDiv() {
  var newDiv = $("<div>").addClass("child-div").html('<input type="text" class="form-control bg-transparent" placeholder="Name" style="width:100%; border: 2px solid black; margin-bottom:10px;">');
  $("#targetDiv").append(newDiv);
}

function getInputValues() {
  var inputValues = [];
  // Iterate through all input elements with type="text"
  $("input[type='text']").each(function() {
    inputValues.push($(this).val());
  });

  // Do something with the collected input values
  console.log(inputValues);
  document.getElementById("id").innerHTML=inputValues;
}


  </script>
  <meta charset="UTF-8">
  <title>Populate Div with Another Div</title>
 
</head>
<body>

<div class="row">
  ADD CHILDREN
  <div class="text-dark" id="targetDiv" style="padding:5px;">
  </div>
  <input type="button" class="btn btn-primary btn-block d-flex justify-content-center" id="btnAddDiv" value="Add Children" onclick="addDiv()" style="width:50%; margin-left:25%; background-color: #773535">
</div>

<!-- Add a button to trigger the function to get values -->
<input type="button" class="btn btn-secondary" value="Get Values" onclick="getInputValues()">
<p id="id"> 
</body>

</html>
