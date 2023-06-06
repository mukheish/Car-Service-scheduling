<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vehicle Booking System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">

  <title>Vehicle Booking System | Admin - Forgot Password</title>

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
        

        <form class="gform" method="post" action="submit_new.php"> 
          <div class="form-group">
            <div class="form-label-group">
            <<input type="hidden" name="email" value="<?php echo $email;?>">
              <p>Enter New password</p>
              <input type="password" name='password'>

            </div>
          </div>
          <input type="submit" name="submit_password" class="btn btn-success btn-block">
        </form>
        <form method="post" action="submit_new.php">
    
    </form>
        

        <div class="text-center">
          <a class="d-block small" href="index.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <?php

if($_GET['email'])
{
  $email=$_GET['email'];
  //$pass=$_GET['reset'];
  $con = mysqli_connect('localhost','root','');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
echo $email;
mysqli_select_db($con,"flone");
$sql="select u_email,u_pwd from tms_user where u_email='$email'";
$result = mysqli_query($con,$sql);

  if($email)
  {
    ?>
    <form method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
  mysqli_close($con);
}

?>
</body>

</html>

