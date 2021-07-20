<?php 
include "config.php";
$error_message = "Please Try Again";$success_message = "Thanks 4 The Info";

// Register user
if(isset($_POST['btnsignup'])){
   $fname = trim($_POST['fname']);
   $lname = trim($_POST['lname']);
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);
   $CCnum = trim($_POST['CCnum']);
   $SSN = trim($_POST['SSN']);
   $confirmpassword = trim($_POST['confirmpassword']);

   $isValid = true;

   // Check fields are empty or not
   if($fname == '' || $lname == '' || $username == '' || $password == '' || $confirmpassword == '' || $CCnum == '' || $SSN == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   }

   // Check if username-ID is valid or not
   if ($isValid && !filter_var($username, FILTER_VALIDATE_username)) {
     $isValid = false;
     $error_message = "Invalid username-ID.";
   }

   if($isValid){

     // Check if username-ID already exists
     $stmt = $con->prepare("SELECT * FROM userinfo WHERE username = '?'");
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "username-ID already exists.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO userinfo(fname,lname,username,password, CCNum, SSN) values($fname, $lname, $username, $password, $CCNum, $SSN)";
  //   $stmt = $con->prepare($insertSQL);
  //   $stmt->bind_param("ssssii",$fname,$lname,$username,$password, $CCnum, $SSN);
 //    $stmt->execute();
 //    $stmt->close();

     $success_message = alert("Thanks 4 the info KEKW.");
   }
}
?>