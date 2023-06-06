<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add Booking

  if(isset($_GET['del']))
{
      $id=intval($_GET['del']);
      $adn="delete from tms_appointment_bookings where u_id=?";
      $stmt= $mysqli->prepare($adn);
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $stmt->close();	 

      
        }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php');?>

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

        <script>

if(isset($_GET['del']))
{
      $id=intval($_GET['del']);
      $adn="delete from tms_appointment_bookings where u_id=?";
      $stmt= $mysqli->prepare($adn);
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $stmt->close();	 

      
        }
        </script>



        <?php } ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Bookings</a>
          </li>
          <li class="breadcrumb-item active">Approve</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Delete Booking
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $aid=$_GET['u_id'];
            $ret="select * from tms_appointment_bookings where u_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <form method ="POST">
            <div class="form-group">
                <label for="exampleInputEmail">Name</label>
                <input type="text" readonly value="<?php echo $row->Full_Name;?>" required class="form-control" id="exampleInputEmail1" name="Full_Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" readonly value="<?php echo $row->Email;?>" class="form-control" name="Email"">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="text" readonly class="form-control" value="<?php echo $row->Phone_no;?>" id="exampleInputEmail1" name="Phone_no">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Car Model</label>
                <input type="email" readonly value="<?php echo $row->Car_Model;?>" class="form-control" name="Car_Model">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Booking Date</label>
                <input type="text" readonly value="<?php echo $row->Date;?>" class="form-control" id="exampleInputEmail1"  name="Date">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Booking Time</label>
                <input type="text" readonly value="<?php echo $row->Time;?>" class="form-control" id="exampleInputEmail1"  name="Time">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Special Request</label>
                <input type="email" readonly value="<?php echo $row->Special_Req;?>" class="form-control" name="Special_Req">
            </div>



            <button type="submit" name="delete_booking" value="Delete" class="btn btn-danger">Delete Booking</button>
          </form>
          <!-- End Form-->
        <?php }?>
        </div>
      </div>

      <hr>




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
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
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
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
