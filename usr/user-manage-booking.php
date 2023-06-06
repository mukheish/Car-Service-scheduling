<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  if(isset($_GET['del']))
  {
        $id=intval($_GET['del']);
        $adn="delete from tms_appointment_bookings  where u_id=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
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
          <li class="breadcrumb-item active ">Manage Booking</li>
        </ol>

        <!-- My Bookings-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Booking</div>
          <div class="card-body">


            <div class="table-responsive" >
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
                    <th>Action</th>
                  </tr>
                </thead>
                <?php

                    $ret="SELECT * FROM tms_appointment_bookings where u_id='$aid'"; //sql code to get to ten trains randomly
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
                    <td ><?php echo $row->booking_id;?>
                    <td><?php echo $row->Full_Name;?>
                    <td><?php echo $row->Email;?>
                    <td><?php echo $row->Phone_no;?></td>
                    <td><?php echo $row->Car_Model;?></td>
                    <td><?php echo $row->service_type;?></td>
                    <td><?php echo $row->Date;?></td>
                    <td><?php echo date('g:ia', strtotime($row->Time));?></td>
                    <td><?php echo $row->Special_Req;?></td>

                    <td>
                      <a href="user-update-booking.php?u_id=<?php echo $row->booking_id;?>" class="badge badge-success"><i class="fa fa-user-edit"></i> Update</a>
                      <a href="user-manage-booking.php?del=<?php echo $row->booking_id;?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this appointment?');"><i class="fa fa-trash"></i> Delete</a>
                    </td>

                  </tr>
                </tbody>
                <?php $cnt = $cnt+1; }?>


              </table>
            </div>
            </div>



      <!-- /.container-fluid -->



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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>
  <script>
  $('table').dataTable({searching: false, paging: false, info: false});
  </script>
</body>

</html>
