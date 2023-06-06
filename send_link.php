<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['submit_email']) && $_POST['email'])
{
    $con = mysqli_connect('localhost','root','');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$email=$_POST['email'];
echo $email;
mysqli_select_db($con,"flone");
$sql="select u_email,u_pwd from tms_user where u_email='$email'";
$result = mysqli_query($con,$sql);

  //mysql_connect('localhost','root','');
  //mysql_select_db('flone');
  //$select=mysql_query("select u_email,u_pwd from tms_user where u_email='$email'");
  if(mysqli_num_rows($result)==1)
  {
    while($row=mysqli_fetch_array($result))
    {
      $email=md5($row['u_email']);
      $pass=md5($row['u_pwd']);
    }
    $link="<a href=http://localhost/flone/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "jackstevens382@gmail.com";
    // GMAIL password
    $mail->Password = "reddeadredemption";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "443";
    $mail->From='your_gmail_id@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress("mukheishrao@gmail.com");
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>