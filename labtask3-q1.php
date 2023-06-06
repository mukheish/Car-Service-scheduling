<?php
// database connection settings
$servername = "localhost";
$username = "root";
$password = "";

// create connection
$conn = new mysqli($servername, $username, $password);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// create database
$sql = "CREATE DATABASE regSystem";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// select database
$conn->select_db("regSystem");

// create table
$sql = "CREATE TABLE student (
    firstName VARCHAR(60) NOT NULL,
    lastName VARCHAR(60) NOT NULL,
    regNo VARCHAR(12) NOT NULL PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    phoneNo VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table student created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// close connection
$conn->close();
?>
