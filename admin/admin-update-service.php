<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['update_service']))
    {
            $s_id= $_GET['u_id'];
            $s_type=$_POST['s_type'];
            $Sedan = $_POST['Sedan'];
            $suv=$_POST['suv'];
            $mpv=$_POST['mpv'];


            $query="update service set  s_type=?, Sedan=?, suv=?, mpv=? where s_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssi',  $s_type, $Sedan, $suv, $mpv, $s_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Service Updated";
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
            <a href="#">Service</a>
          </li>
          <li class="breadcrumb-item active">Update Service</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Update Service
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $aid=$_GET['u_id'];
            $ret="select * from service where s_id=?";
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
                <label for="exampleInputEmail1">s_type</label>
                <input type="text" value="<?php echo $row->s_type;?>" required class="form-control" id="exampleInputEmail1" name="s_type">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sedan</label>
                <input type="text" class="form-control" value="<?php echo $row->Sedan;?>" id="exampleInputEmail1" name="Sedan">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">suv</label>
                <input type="text" class="form-control" value="<?php echo $row->suv;?>" id="exampleInputEmail1" name="suv">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">mpv</label>
                <input type="text" class="form-control" value="<?php echo $row->mpv;?>" id="exampleInputEmail1" name="mpv">
            </div>

            <button type="submit" name="update_service" class="btn btn-success">Update Service</button>
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
