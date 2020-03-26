<?php 
include 'Connect_Login_Database.php';
 
$id = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$ab = $_POST['about_me'];
$gen = $_POST['Gender'];
$alamat = $_POST['address'];
$bh = $_POST['birthdate'];
$hp = $_POST['MobilePhone'];
 

mysqli_query($conn, "UPDATE `profile` SET `FirstName` = '$first_name', `LastName` = '$last_name', `Gender` = '$gen', `Birthday` = '$bh', `Address` = '$alamat', `Mobilephone` = '$hp', `AboutMe`='$ab' WHERE `Username` = '$id'");
header('location:EditProfile.php?id='. "$id");
 
?>