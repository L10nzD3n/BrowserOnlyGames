<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "info";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])){
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $SSN = $_POST['SSN'];
   $confirmpassword = $_POST['confirmpassword'];

  $query = "INSERT INTO userinfo (fname,lname, username, password, SSN)
  VALUES ('$fname', '$lname', '$username', '$password', '$SSN')";

    if (!mysqli_query($dbconnect, $query)) {
        die('An error occurred.');
    } else {
      echo "Thanks for your info.";
    }

}
?>