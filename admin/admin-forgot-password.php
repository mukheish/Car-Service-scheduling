<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vehicle Booking System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">
  <title>Car Service Management System | Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>

        <form class="gform" id="firstFormID" method="POST"  action="https://script.google.com/macros/s/AKfycbzQk4JR6Dt3fHC6sjlt18URow7b2Monvd18txeGSkBnc2AMHwTGkp04jI9guocA6meX/exec"> 
          <div class="form-group">
            <div class="form-label-group">
            <label for="formGoogleSendEmailtype"></label>
                <input class="form-control" type="text" id="formGoogleSendEmailtype" name="formGoogleSendEmailtype" placeholder="Enter email address"><br><br>
                <div style="display:none" class="thankyou_message">
 <!-- You can customize the thankyou message by editing the code below -->
 <h2><em>Thanks</em> for contacting us! We will get back to you soon!
 </h2>
</div>
            </div>
          </div>
          <a><input onclick="showModal()" type="submit"  class="btn btn-success btn-block"></a><br>
        </form>
        

        <div class="text-center">
       
          <a class="btn btn-success btn-block" href="index.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Email Reset</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">You will receive an email to reset the password</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok</button>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script>
  
  window.addEventListener("DOMContentLoaded", function() { // 'window.onload = function...' also works 
  
  
  const firstForm = document.getElementById("firstFormID");
  firstForm.addEventListener("submit", function(e) { // 'yourForm.onsubmit = function...` also works too
    
    e.preventDefault(); 
    const data = new FormData(firstForm); 
    const action = e.target.action; 
    fetch(action, { 
      method: 'POST', 
      body: data, 
    }).then((data) => {
      if (data.Status == "Approved") {
        // finished, you can do whatever you want here
       
        
      }
    })
  })
});


</script>
<script>
  function showModal(){
  $("#emailModal").modal("show");
}
 </script>
</body>

</html>
