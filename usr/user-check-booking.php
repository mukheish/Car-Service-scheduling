<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];

?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php');?>

<body id="page-top">

 <?php include("vendor/inc/nav.php");?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/sidebar.php');?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item ">Appointment</li>
          <li class="breadcrumb-item active">View Booking</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            List of Booking</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Car Model</th>
                    <th>Service Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Special Request</th>
                    <th>Status</th>
                    <th>Mechanic</th>
                  </tr>
                </thead>
                <?php

                  $ret="SELECT * FROM tms_appointment_bookings where u_id='$aid'"; //get all bookings
                  $stmt= $mysqli->prepare($ret) ;
                  $stmt->execute() ;//ok
                  $res=$stmt->get_result();
                  $cnt=1;
                  while($row=$res->fetch_object())
                {
                ?>

                <tbody>
                  <tr>

                    <td><?php echo $cnt;?></td>
                    <td><?php echo $row->Full_Name;?>
                    <td><?php echo $row->Email;?>
                    <td><?php echo $row->Phone_no;?></td>
                    <td><?php echo $row->Car_Model;?></td>
                    <td><?php echo $row->service_type;?></td>
                    <td><?php echo $row->Date;?></td>
                    <td><?php echo date('g:ia', strtotime($row->Time));?></td>
                    <td><?php echo $row->Special_Req;?></td>
                    <td><?php if($row->Status== "Pending"){ echo '<span class = "badge badge-warning">'.$row->Status.'</span>'; } else { echo '<span class = "badge badge-success">'.$row->Status.'</span>';}?></td>
                    <td><?php echo $row->mechanic_Name;?></td>




                    </td>
                  </tr>
                </tbody>
                <?php  $cnt = $cnt +1; }?>

              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"><?php
              date_default_timezone_set("Asia/Kuala_Lumpur");
              echo "Generated : " . date("h:i:sa");
            ?> </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

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
      <?php include("vendor/inc/footer.php");?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
