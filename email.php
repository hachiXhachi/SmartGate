<!DOCTYPE html>
<html>

<head>
  <link rel='stylesheet' href='cssCodes/main.css'>
  <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    #container_pass {
      max-height: 600px;
      max-width: 600px;
      width: 100%;
      height: auto;
      background-color: #545454;
      font-family: sans-serif;
      padding: 20px;
      text-align: center;
      border-radius: 5px;
    }


    .lds-dual-ring {
      display: inline-block;
      width: 80px;
      height: 80px;
      margin-top: 50px;
    }

    .lds-dual-ring:after {
      content: " ";
      display: block;
      width: 64px;
      height: 64px;
      margin: 8px;
      border-radius: 50%;
      border: 6px solid #fdd;
      border-color: #fdd transparent #fdd transparent;
      animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
  <meta charset="UTF-8">
  <title>Populate Div with Another Div</title>

</head>

<body>
  <!-- Modal HTML -->
  <div class="modal fade" id="errorModal" tabindex="5" role="dialog" aria-labelledby="errorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalMessage">
          Email could not be sent. Please try again later.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div id="container_pass" class="position-absolute top-50 start-50 translate-middle">

    <div class="lds-dual-ring" style="display:none;"></div>


    <form id="emailForm" method = "POST" action="email verify.php">
      <br><br>
      <input type="email" name="email" id="email" class="form-control" placeholder="email" required>
      <br><br>
      <input type="text" name="subject" id="subject" class="form-control" placeholder="subject">
      <br><br>
      <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="message"></textarea>
      <br><br>
      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
  
</body>

<script>
  function sendEmail() {
    const email = document.getElementById("email");
    const subject = document.getElementById("subject");
    const message = document.getElementById("message");
    const modalContent = document.getElementById("modalMessage");
    const modalLabel = document.getElementById("errorModalLabel");
    $('#emailForm button[type="button"]').prop('disabled', true);
    $('.lds-dual-ring').show();
    var formData = $('#emailForm').serialize();
    console.log(formData);
    $.ajax({
      type: 'POST',
      url: 'sample_send_email.php',
      data: formData,
      success: function (response) {
        console.log(response);
        $('.lds-dual-ring').hide();
        if (response === 'success') {
          modalContent.innerHTML = "Your Email was Sent Succesfully"
          modalLabel.innerHTML = "Message"
          email.value = "";
          subject.value = "";
          message.value = "";
          $('#errorModal').modal('show');
        } else {
          $('#errorModal').modal('show');
        }
        $('#emailForm button[type="button"]').prop('disabled', false);

      }
    });
  }
</script>

</html>