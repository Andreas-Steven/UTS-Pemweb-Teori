<!DOCTYPE html>
<html>
<head>
	<title>Login | UTS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
	<style type="text/css">
		body {
			background-image: url("Images/3_Sekawan.jpg");
			background-size: 100%; 
			font-family: "Segoe UI";
		}
		#wrapper {
			background-color: #DCDCDC;
			opacity: 0.85;
			width: 420px;
			height: 510px;
			margin-top: 120px;
			margin-left: auto;
			margin-right: auto;
			padding: 20px;
			border-radius: 10px;
		}
		input[type=text], input[type=password] {
			border: 1px solid #ddd;
			padding: 10px;
			width: 93%;
			border-radius: 2px;
			outline: none;
			margin-top: 10px;
			margin-bottom: 15px;
			margin-left: 15px;
			margin-right: 15px;
		}
		label, h1 {
			text-transform: uppercase;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 40px;
			color: #7a58ff;
		}
		#button {
			border-radius: 5px;
			padding: 10px;
			width: 120px;
			background-color: #7a58ff;
			border: none;
			color: #fff;
			font-weight: bold;
			margin-left: 120px;
		
			
		}

		#dibtn :hover{
			background-color: #50ace0;
		}

		.error {
			background-color: #f72a68;
			width: 400px;
			height: auto;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
			padding: 20px;
			border-radius: 4px;
			color: #fff;

		}
	</style>
    <script>
        function removeCookies() 
        {
            var res = document.cookie;
            var multiple = res.split(";");
            
            for(var i = 0; i < multiple.length; i++) 
            {
                var key = multiple[i].split("=");
                document.cookie = key[0]+" =; expires = Thu, 01 Jan 1970 00:00:00 UTC";
            }
        }
    </script>

    <style>
        a
        {
            color: #50ace0;
            text-decoration: none;
        }
    </style>
</head>

<body onload="removeCookies()">
<body>
	<div id="wrapper">
	<form action="logincontroller.php" method="POST" id="captcha_form">
		<div>
		<h1>Login</h1>
		<input type="text" name="username" placeholder=" Username" required="" autofocus="">
		<br>
		<br>
		<input type="password" name="password" placeholder=" Password" required="">
		</div>
		<br>
		<div class="form-group" style="margin-left:15px; margin-right: auto; margin-top: 2px">
                <div class="g-recaptcha" data-sitekey="6Lenhd8UAAAAAJow59-oDJnq4yJSS27emX1Y4VYp" style="margin-bottom: 10px;"></div>
            </div>
		<br>
			<div id="dibtn">
			<input action="logincontroller.php" id="button" type="submit" value="LOGIN">
	</div>
	</form>
	<br>
	<br>
	  <p style="text-align: right; margin-right: 15px;">Don't have an account? <a href="Register.php">Register Here </a></p>  


	<!-- Menampung jika ada pesan -->
	<?php if(isset($_GET['pesan'])) {  ?>
	<label style="color:red; margin-left:15px;margin-top: 10px;"><?php echo $_GET['pesan']; ?></label>
	<?php } ?>	
	</div>
</body>
</html>