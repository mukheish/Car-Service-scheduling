<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['Usr-login']))
    {
      $u_email=$_POST['u_email'];
      $u_pwd=($_POST['u_pwd']);//
      $stmt=$mysqli->prepare("SELECT u_email, u_pwd, u_id FROM tms_user WHERE u_email=? and u_pwd=? ");//sql to log in user
      $stmt->bind_param('ss',$u_email,$u_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($u_email,$u_pwd,$u_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['u_id']=$u_id;//assaign session to user id
      $_SESSION['login']=$u_email;
      $uip=$_SERVER['REMOTE_ADDR'];
      $ldate=date('d/m/Y h:i:s', time());
      if($rs)
      {//get user logs
        $uid=$_SESSION['u_id'];
        $uemail=$_SESSION['login'];
        $ip=$_SERVER['REMOTE_ADDR'];
        $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'];
        $country = $addrDetailsArr['geoplugin_countryName'];
        $log="insert into userLog(u_id, u_email, u_ip, u_city, u_country) values('$uid','$uemail','$ip','$city','$country')";
        $mysqli->store_result();  //$mysqli->query($log);
        if($log)
        {
         header("location:user-dashboard.php");
         }
        }
      else
      {
      #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
      $error = "Access Denied Please Check Your Credentials";
      }
  }
?>
<!--End Server Side Script Injection-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Car Service Management System - User Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">


        <!--INJECT SWEET ALERT-->
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
                    <div class="form-label-group">
                        <form action="">
                            <h2>User Login</h2>

                            <div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="email" name="u_email" id="inputEmail"  placeholder="Email address" required="required" autofocus="autofocus">
                                <label for="inputEmail">Email</label>
                            </div>


                            <div class="inputbox">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                                <input type="password" name="u_pwd" id="inputPassword" placeholder="Password"  required="required">
                                <label for="inputPassword">Password</label>

                            </div>



                              <button name="Usr-login" class="btn btn-success btn-block" value="Login">Login</button><br>

                        </form>

                        <div class="text-center">
                          <a class="btn btn-success btn-block" href="usr-register.php">Register an Account</a>
                          <a class="btn btn-success btn-block" href="usr-forgot-password.php">Forgot Password?</a>
                          <a class="btn btn-success btn-block" href="../index.html">Home</a>
                        </div>

                    </div>
                </div>
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


            </body>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
