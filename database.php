<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<form name="form" action="" method="get">
<br><br>
    <label for="password">New Password:</label>
    <input type="text" name="password" id="password">
    <br><br>
    <label for="Cpassword">Confirm New Password:</label>
    <input type="text" name="Cpassword" id="Cpassword">
    <input type="submit" value="Reset password">
</form>
<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"vehiclebookings");
$sql="SELECT * FROM tms_user WHERE u_email = '$q'";
$result = mysqli_query($con,$sql);

// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
// while($row = mysqli_fetch_array($result)) {
//   echo "<tr>";
//   echo "<td>" . $row['u_fname'] . "</td>";
//   echo "<td>" . $row['u_lname'] . "</td>";
//   echo "<td>" . $row['u_phone'] . "</td>";
//   echo "<td>" . $row['u_addr'] . "</td>";
//   echo "<td>" . $row['u_lname'] . "</td>";
//   echo "</tr>";
// }
// echo "</table>";

echo $_GET['password'];
echo $_GET['Cpassword'];

mysqli_close($con);
?>

</body>
</html>