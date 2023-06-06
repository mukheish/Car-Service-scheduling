

<!DOCTYPE html>
<html lang="en">

<?php include("vendor/inc/head.php");?>
<?php
  session_start();
  include('admin/vendor/inc/config.php');
  include('admin/vendor/inc/checklogin.php');
error_reporting(0);

  //add booking
  if(isset($_POST['appointment_booking']))
    {

            $name=$_POST['name'];
            $email = $_POST['email'];
            $phone=$_POST['phone'];
            $message=$_POST['message'];

            $conn = mysql_connect("localhost", "root", "tms_contact_us") or die("connection failed");
            $sql="insert into tms_contact_us (name, email, phone, message )
            values('{$name}','{$email}','{$phone}','{$message}')";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssss',$name, $email, $phone, $message);

            $stmt->execute();
                if($stmt)
                {
                    $succ = "Appointment Added";
                }
                else
                {
                    $err = "Please Try Again Later";
                }
            }



?>
<body>




  <!-- Navigation -->
 <?php include("vendor/inc/nav.php");?>

 <?php if(isset($succ)) {?>
                   <!--This code for injecting an alert-->
   <script>
               setTimeout(function ()
               {
                   swal("Success!","<?php echo $succ;?>!","success");
               },
                   100);
   </script>

   <?php } ?>
   <?php if(isset($err)) {?>
   <!--This code for injecting an alert-->
   <script>
               setTimeout(function ()
               {
                   swal("Failed!","<?php echo $err;?>!","Failed");
               },
                   100);
   </script>

   <?php } ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact Us
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
        <form name="sentMessage" id="contactForm" novalidate action="contact_display.php" method="post">

          <form  action="index.html" method="post">

          <div class="control-group form-group">
            <div class="controls">
              <label for="name">Full Name:</label>
              <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label for="phone">Phone Number:</label>
              <input type="tel" class="form-control" id="phone" name="phone"required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>

          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" name="send_message" class="btn btn-success" id="sendMessageButton">Send Message</button>

        </form>
      </div>




      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
          No 29, Jalan Palma Raja 2
          Bandar Botanik
          41200 Klang
          Selangor
          Malaysia

          <br>
        </p>

        <h3>Call Now</h3>
        <p>

          017-697 6804
        </p>

        <h3>Opening Hours</h3>
        <p>
                  Mon:	9:00 am – 7:00 pm
              <br>Tue:	9:00 am – 7:00 pm
              <br>Wed:	9:00 am – 7:00 pm
              <br>Thu:	9:00 am – 7:00 pm
              <br>Fri:	9:00 am – 7:00 pm
              <br>Sat:	9:00 am – 7:00 pm
              <br>Sun:	Closed

        </p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include("vendor/inc/footer.php");?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

<script src="vendor/js/swal.js"></script>

</body>

</html>
