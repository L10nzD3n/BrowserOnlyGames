
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
function isZipFile($filepath){
    $fh = fopen($filepath,'r');
    $bytes = fread($fh,4);
    fclose($fh);
    return ('504b0304' === bin2hex($bytes));
}
if isZipFile($target_file);
  $uploadOk == 0
  echo "Sorry, only ZIP Files Allowed"

  
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded to /uploads.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>