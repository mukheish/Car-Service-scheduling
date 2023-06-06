<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehiclebookings";

if(isset($_POST['name']))
    $name=$_POST['name'];
    $email = $_POST['email'];
    $phone=$_POST['contact_no'];
    $message=$_POST['message'];
            // Create connection
            $dbuser="root";
            $dbpass="";
            $host="localhost";
            $db="vehiclebookings";
            $mysqli=new mysqli($host,$dbuser, $dbpass, $db);

$query="insert into tms_message (m_uname, m_email, m_phone, m_message )
            values(?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssss',$name, $email, $phone, $message);

            $stmt->execute();
            if($stmt)
            {
                header("Location: index.html");
                exit();
            }
            else
            {
                
            }

?>