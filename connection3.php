<?php

$hostname = "localhost";
$username = "root";
$password = '';

$conn = mysqli_connect($hostname, $username, $password)
or die("could not connect to mySQL");

$db= "regsystem";
mysqli_select_db($conn,$db) or
die ("could not select database");


 ?>
