<?php
if($_POST['email'])
{

  $email=$_POST['email'];
  $pass=$_POST['password'];
  $con = mysqli_connect('localhost','root','');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
echo $email;
mysqli_select_db($con,"vehiclebookings");
$sql="update tms_admin set a_pwd='$pass' where a_email='$email'";
$result = mysqli_query($con,$sql);
mysqli_close($con);
}

if ($email){
  //You need to redirect
  header("Location: index.php");
  exit();
 }
else{
  // do something
}
?>