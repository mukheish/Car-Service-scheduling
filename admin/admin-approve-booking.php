<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add Booking
  if(isset($_POST['approve_booking']))
    {
            $u_id = $_GET['u_id'];

            $Status  = $_POST['Status'];
            $Mechanic  = $_POST['mechanic'];
            $query="update tms_appointment_bookings set Status=?, mechanic_Name=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssi',  $Status, $Mechanic, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Booking Approved";
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
            <a href="#">Bookings</a>
          </li>
          <li class="breadcrumb-item active">Approve</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Approve Booking
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $id=$_GET['u_id'];
            $ret="select * from tms_appointment_bookings where booking_id=?";
            $stmt= $mysqli->prepare($ret);
            $stmt->bind_param('i',$id);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())





        {
        ?>
          <form id="firstFormID" method ="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" readonly value="<?php echo $row->Full_Name;?>" required class="form-control" id="exampleInputEmail1" name="Full_Name">
            </div>

            <div class="form-group">
                <label for="formGoogleSendEmailtype">Email address</label>
                <input type="email" readonly value="<?php echo $row->Email;?>" class="form-control" id="formGoogleSendEmailtype" name="formGoogleSendEmailtype">
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
                <label for="formGoogleSendEmailDate">Booking Date</label>
                <input type="text" readonly value="<?php echo $row->Date;?>" class="form-control" id="formGoogleSendEmailDate" name="formGoogleSendEmailDate">

            </div>

            <div class="form-group">
                <label for="formGoogleSendEmailTime">Booking Time</label>
                <input type="text" readonly value="<?php echo $row->Time;?>" class="form-control" id="formGoogleSendEmailTime"  name="formGoogleSendEmailTime">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Special Request</label>
                <input type="email" readonly value="<?php echo $row->Special_Req;?>" class="form-control" name="Special_Req">
            </div>

            <div class="form-group">
              <label name="mechanic" for="exampleInputEmail1">Mechanic</label><br>
              <?php include('vendor/inc/select-option.php');?>
              

            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Booking Status</label>
              <select class="form-control" name="Status" id="exampleFormControlSelect1">
                <option>Approved</option>
                <option>Pending</option>
              </select>
            </div>

            <button type="submit" name="approve_booking" style="margin: 10px;" class="btn btn-success">Approve Booking</button>
          </form>
          <div style="margin: 10px;">
          <form id="yourFormID" method="POST" action="https://script.google.com/macros/s/AKfycbxaBB720pddjiU-M8RyGfa_NcuBzBq57JNPCFgxfYf8rSRt4XxmVl_Sv_r8C8V5z5oz/exec">
            <button id="emailButton" onclick="showModal()" type="submit" name="email_booking" class="btn btn-success">Add Email Notification Reminder</button>
          </form> 
          </div>
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

  <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Email Notification for User is set</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">User will receive an email reminding about the service booking one day before service appointment</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          
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

 <script>
  
  window.addEventListener("DOMContentLoaded", function() { // 'window.onload = function...' also works 
  
  const yourForm = document.getElementById("yourFormID");
  const firstForm = document.getElementById("firstFormID");
  yourForm.addEventListener("submit", function(e) { // 'yourForm.onsubmit = function...` also works too
    
    e.preventDefault(); 
    const data = new FormData(firstForm); 
    const action = e.target.action; 
    fetch(action, { 
      method: 'POST', 
      body: data, 
    }).then((data) => {
      if (data.Status == "Approved") {
        // finished, you can do whatever you want here
       
        
      }
    })
  })
});


</script>
 <script>
  function showModal(){
  $("#emailModal").modal("show");
}
 </script>
</body>

</html>
