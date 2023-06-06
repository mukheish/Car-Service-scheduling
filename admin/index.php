<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['admin_login']))
    {
      $a_email=$_POST['a_email'];
      $a_pwd=($_POST['a_pwd']);//
      $stmt=$mysqli->prepare("SELECT a_email, a_pwd, a_id FROM tms_admin WHERE a_email=? and a_pwd=? ");//sql to log in user
      $stmt->bind_param('ss',$a_email,$a_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($a_email,$a_pwd,$a_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['a_id']=$a_id;//assaign session to admin id
      //$uip=$_SERVER['REMOTE_ADDR'];
      //$ldate=date('d/m/Y h:i:s', time());
      if($rs)
      {//if its sucessfull
        header("location:admin-dashboard.php");
      }

      else
      {
      #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
      $error = "Access Denied Please Check Your Credentials";
      }
  }
?>
<!--End Server side-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vehicle Booking System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">

  <title>Car Service Management System - Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <!--Trigger Sweet Alert-->
  <?php if(isset($error)) {?>
  <!--This code for injecting an alert-->
      <script>
            setTimeout(function ()
            {
              swal("Failed!","<?php echo $error;?>!","error");
            },
              100);
      </script>

  <?php } ?>

    <link rel="stylesheet" href="index.css">

  <body>
      <section>
        <form method="POST">
          <div class="form-box">
              <div class="form-value">
                  <form action="">

                      <h2>Admin Login</h2>
                      <div class="inputbox">
                          <ion-icon name="mail-outline"></ion-icon>
                          <input type="email" id="inputEmail" name="a_email"  placeholder="Email address" required="required" autofocus="autofocus">
                          <label for="">Email</label>
                      </div>

                      <div class="inputbox">
                          <ion-icon name="lock-closed-outline"></ion-icon>
                          <input type="password" id="inputPassword" name ="a_pwd"  placeholder="Password" required="required" >
                          <label for="">Password</label>
                      </div>



                      <button class="btn btn-success btn-block" name="admin_login" value="Login">Log in</button><br>

                  </form>

                  <div class="text-center">
                    <a class="btn btn-success btn-block" href="../index.html">Home</a>
                    <a class="btn btn-success btn-block" href="../admin/admin-forgot-password.php">Forgot Password?</a>
                  </div>

              </div>
          </div>
      </section>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
  </html>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--Sweet alerts js-->
  <script src="vendor/js/swal.js"></script>


</body>

</html>
