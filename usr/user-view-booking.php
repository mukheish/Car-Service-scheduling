<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];


  //add booking
  if(isset($_POST['appointment_booking']))
    {

            $Full_Name=$_POST['Full_Name'];
            $Email = $_POST['Email'];
            $Phone_no=$_POST['Phone_no'];
            $Car_Model=$_POST['Car_Model'];
            $service_type = $_POST['service_type'];
            $Date=$_POST['Date'];
            $Time=$_POST['Time'];
            $Special_Req=$_POST['Special_Req'];
            $status ="Pending";

            $query="insert into tms_appointment_bookings (u_id, Full_Name, Email, Phone_no, Car_Model, service_type, Date, Time, Special_Req, Status )
            values(?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('isssssssss',$aid, $Full_Name, $Email, $Phone_no, $Car_Model, $service_type, $Date, $Time, $Special_Req, $status);

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


<!DOCTYPE html>
<html lang="en">
<?php include("vendor/inc/head.php");?>

<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">




    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Appointment</li>
          <li class="breadcrumb-item active ">New Booking</li>
        </ol>

        <!-- My Bookings-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            New Booking</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

<html>
<head>
	<title>Car Service Booking Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
		}

		form {
			width: 50%;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px #ccc;
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input, select {
			display: block;
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
			font-size: 16px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			cursor: pointer;
			font-size: 20px;
			padding: 10px 20px;
			border-radius: 5px;
			margin-top: 20px;
			margin-bottom: 10px;
			transition: background-color 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Car Service Booking Form</h1>
	<form method="post" >
		<label>Full Name: </label>
		<input type="text" name="Full_Name" required>

		<label>Email: </label>
		<input type="email" name="Email" required>

		<label>Phone Number: </label>
		<input type="tel" name="Phone_no" required>

		<label>Car Model: </label>
		<input type="text" name="Car_Model" required>

    <label >Service Type: </label>

      <?php

      
      include('vendor/inc/service-select-option.php');
      
?>

		<label>Date: </label>
		<input type="date" name="Date" required>

		<label>Time: </label>
		<input type="time" name="Time" required>

    <label>Special Request: </label>
		<input type="text" name="Special_Req" required>


    <button type="submit" name="appointment_booking" class="btn btn-success">Confirm</button>

    <div class="container-fluid">
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
	</form>
</body>
</html>
</tr>
</thead>


              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            <?php
              date_default_timezone_set("Asia/Kuala_Lumpur");
              echo "Generated:" . date("h:i:sa");
            ?>
        </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include("vendor/inc/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="user-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>


  <script src="vendor/js/swal.js"></script>

</body>

</html>
