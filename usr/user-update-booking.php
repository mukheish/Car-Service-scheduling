<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  //Add USer
  if(isset($_POST['update_booking']))
    {
            $Full_Name=$_POST['Full_Name'];
            $Email = $_POST['Email'];
            $Phone_no=$_POST['Phone_no'];
            $Car_Model=$_POST['Car_Model'];
            $s_type=$_POST['s_type'];
            $Date=$_POST['Date'];
            $Time=$_POST['Time'];
            $Special_Req=$_POST['Special_Req'];


            $query="update tms_appointment_bookings set Full_Name=?, Email=?, Phone_no=?, Car_Model=?, service_type=?, Date=?, Time=?, Special_Req=? where booking_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssssss',$Full_Name, $Email, $Phone_no, $Car_Model, $s_type, $Date, $Time, $Special_Req, $aid);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Booking Updated";
                }
                else
                {
                    $err = "Please Try Again Later";
                }
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

        <?php } ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Users</a>
          </li>
          <li class="breadcrumb-item active">Add User</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Add User
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $id=$_GET['u_id'];
            $ret="select * from tms_appointment_bookings where booking_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$id);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <form method ="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" value="<?php echo $row->Full_Name;?>" required class="form-control" id="exampleInputEmail1" name="Full_Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" value="<?php echo $row->Email;?>" id="exampleInputEmail1" name="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone_no</label>
                <input type="text" class="form-control" value="<?php echo $row->Phone_no;?>" id="exampleInputEmail1" name="Phone_no">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Car_Model</label>
                <input type="text" class="form-control" value="<?php echo $row->Car_Model;?>" id="exampleInputEmail1" name="Car_Model">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Service_type</label>
                <input type="text" class="form-control" value="<?php echo $row->service_type;?>" id="exampleInputEmail1" name="s_type">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="text" class="form-control" value="<?php echo $row->Date;?>" id="exampleInputEmail1" name="Date">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Time</label>
                <input type="text" class="form-control" value="<?php echo $row->Time;?>" id="exampleInputEmail1" name="Time">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Special_Req</label>
                <input type="text" class="form-control" value="<?php echo $row->Special_Req;?>" id="exampleInputEmail1" name="Special_Req">
            </div>

            <div class="form-group" style="display:none">
                <label for="exampleInputEmail1">Category</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="User" name="u_category">
            </div>




            <button type="submit" name="update_booking" class="btn btn-success">Update Booking</button>
          </form>
          <!-- End Form-->
        <?php }?>
        </div>
      </div>

      <hr>


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
