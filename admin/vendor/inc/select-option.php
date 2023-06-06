<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "vehiclebookings";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `tms_mechanic`";

// for method 1

$result1 = mysqli_query($connect, $query);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <!--Method One-->

        <select name="mechanic">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option  value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select>

   </body>
 </html>
