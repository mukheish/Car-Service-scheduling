<?php
session_start();
$dbHost = 'localhost';
$dbName = 'flone';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>