<?php
include 'Connect_Login_Database.php';
$id = $_POST['username'];
  $msg = "";
  if (isset($_POST['upload'])) {
  	$image = $_FILES['cover']['name'];
  	$target = "cover/".basename($image);
 
  	$sql = "UPDATE `profile` SET `Cover` = '$image' WHERE `Username` = '$id'";
  	mysqli_query($conn, $sql);
 
  	if (move_uploaded_file($_FILES['cover']['tmp_name'], $target)) {
  	$msg = "Image uploaded successfully";
  	}else{
  	$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT `Cover` FROM `profile`");
  header('location:EditProfile.php?id='. "$id");
?>