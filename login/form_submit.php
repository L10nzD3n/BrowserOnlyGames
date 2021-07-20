<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "info";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['but_submit'])){

    $uname = $_POST['txt_uname'];
    $password = $_POST['txt_pwd'];

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from userinfo where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($dbconnect,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 1){
            $_SESSION['uname'] = $uname;
            header('Location: /xcdfergt');
        }else{
            echo "Invalid username and password";
        }

    }

}