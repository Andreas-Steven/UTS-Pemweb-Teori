<?php 
ob_start();
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Connect_Login_Database.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$Chipertext_Password = hash('sha256', $password); 

$Captcha = $_POST['g-recaptcha-response'];
$SecretKey = "6Lenhd8UAAAAALGMnD8lnIOlZKv6e4nBpisRwYeQ";
$IP = $_SERVER['REMOTE_ADDR'];
$Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$SecretKey."&response=".$Captcha."&remoteip=".$IP);
$ResponseKeys = json_decode($Response,true);

if(intval($ResponseKeys["success"]) != 1) 
{
	//pesan jika reCAPTCHA tidak di centang
	//setcookie('MESSAGE', "CAPTCHA Invalid", time() + (86400 * 30), "/");
	header("Location:Login.php?pesan=Invalid CAPTCHA.");
}
else
{
	//pesan jika reCAPTCHA berhasil
	// menyeleksi data user dengan username dan password yang sesuai
	$query = "SELECT * FROM `user` WHERE  `Username`='$username' AND `Password`='$Chipertext_Password'";
	$result = mysqli_query($conn, $query) or die($koneksi);
	$cek = mysqli_num_rows($result);
	
	if($cek == 1) 
	{
		$data = mysqli_fetch_assoc($result);
		//menyimpan session user, nama, status dan id login
		$_SESSION['username'] = $username;
		$_SESSION['first_name'] = $data['FirstName'];
		$_SESSION['last_name'] = $data['LastName'];
		$_SESSION['email'] = $data['Email'];
		$_SESSION['status'] = "sudah_login";
		$_SESSION['id_login'] = $data['id'];

		header("location:Timeline.php");
	} 
	else 
	{
		header("location:Login.php?pesan=$cek");
	}
}

?>