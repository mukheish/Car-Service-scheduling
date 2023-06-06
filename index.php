<?php
  session_start();
  include('admin/vendor/inc/config.php');
  //include('vendor/inc/checklogin.php');
  //check_login();
  //$aid=$_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include("vendor/inc/head.php");?>

<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php");?>
<!--End Navigation-->

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('mechanic3.jpg')">
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('mechanic5.jpg')">
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('mechanic4.jpg')">
        </div>

        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Car Service Management System </h1>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Why Us</h4>
          <a href="resetpass.html">Home</a>
          <div class="card-body">
            <p class="card-text">Increase productivity & manage the workforce more efficiently
                                  when you switch to the Vehicle service management system.
                                  It is a system that covers various aspects such as managing
                                  car service appointments & digital marketing.</p>
          </div>

        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Car Services Booking Guidlines</h4>
          <div class="card-body">
            <p class="card-text">

              <ol>
                <li>click <strong>"Login Panel" </strong>then click User Login.</li>
                <li>Click <strong>"Register An Account"</strong> if you dont have any account <strong></strong> then fill in the required information and click  <strong>"Create Account"</strong></li>
                <li>After that, enter the registered email.</li>
                <li>After entering the login page ,click <strong>"Appointments"</strong> then <strong>"New Booking"</strong> to make a car service booking. </li>
                <li>Next, fill in the required information and select a date for your car service then Click  <strong>"Submit".</strong></li>
                <li>You can Manage Booking by Click <strong>"Manage Booking."</strong>   </li>
              </ol>

            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Portfolio Section -->
    <h2 class="center">Top Vehicles</h2>
    <!--Portfolio Section -->
    <hr>
    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="car1.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="car2.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="car3.jpg" alt=""></a>
        </div>
      </div>

    </div>
    <!-- /.row -->


    <hr>
    <h1 class="my-4">Client Testimonials</h1>

    <div class="row">
    <?php

      $ret="SELECT * FROM tms_feedback where f_status ='Published' ORDER BY RAND() LIMIT 3 "; //get all feedbacks
      $stmt= $mysqli->prepare($ret) ;
      $stmt->execute() ;//ok
      $res=$stmt->get_result();
      $cnt=1;
      while($row=$res->fetch_object())
    {
    ?>
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header"><?php echo $row->f_uname;?></h4>
          <div class="card-body">
            <p class="card-text"><?php echo $row->f_content;?></p>
          </div>
          </div>
      </div>
    <?php }?>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
    <?php include("vendor/inc/footer.php");?>
  <!--.Footer-->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
