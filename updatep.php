<?php
include 'Connect_Login_Database.php';
$id = $_POST['username'];
$imagename=$_FILES["pp"]["name"]; 
  $msg = "";
  if (isset($_POST['upload'])) {
  	$image = $_FILES['pp']['name'];
  	$target = "img/profile/".basename($image);
 
  	$sql = "UPDATE `profile` SET `Image` = '$image' WHERE `Username` = '$id'";
  	mysqli_query($conn, $sql);
 
  	if (move_uploaded_file($_FILES['pp']['tmp_name'], $target)) {
  	$msg = "Image uploaded successfully";
  	}else{
  	$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT `Image` FROM `profile`");
  header('location:EditProfile.php?id='. "$id");
?>