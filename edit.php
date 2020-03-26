<?php
    session_start();
    $Username = $_SESSION['username'];
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="/css/antisocial.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">

    <title>ANTI-Social</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        .box 
        {
            width: 50%;
            border: 5px solid turquoise;
            padding: 10px;
            margin: 0 auto;
            margin-top: 100px;
            text-align: center;
        }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="css/home2.css" rel="stylesheet">
</head>
<body>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous">
            
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>  

    <nav class="navbar navbar-light bg-white">
        <a href="TIMELINE.php" class="navbar-brand"><b>Anti-Social</b></a>
        <div class="menu">
        <ul>
            <li><a href="Profile.php">PROFILE</a></li>
            <li><a href="EditProfile.php">VIEW PROFILE</a></li>
            <li><?php echo "<a href='EditProfile.php?id=$Username'>EDIT PROFILE</a>"; ?></li>
            <li><a href="Login.php">LOGOUT</a></li>
        </ul>
    </div>
        <form action="SearchPage.php" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>

    <?php 
        include 'Connect_Login_Database.php';
        $id = $_GET['id'];
        $data = mysqli_query($conn,"SELECT * FROM `profile` WHERE `Username` = '$id'");
        while($d = mysqli_fetch_array($data)) 
        {
    ?>
    <div class="box">
    <form action="update.php" method="post">
			<div>
                <label>Username</label>
                <input type="text" value="<?php echo $d['Username']; ?>" disabled/>
                <input type="hidden" name="username" id="username" value="<?php echo $d['Username']; ?>" readonly="" />
            </div>
            <div>
                <label>About Me</label>
				<input type="textarea" name="about_me" id="about_me" value="<?php echo $d['AboutMe']; ?>"/>
            </div>
			<div>
                <label>First Name</label>
				<input type="text" name="first_name" id="first_name" value="<?php echo $d['FirstName']; ?>"/>
            </div>
            <div>
                <label>Last Name</label>
				<input type="text" name="last_name" id="last_name" value="<?php echo $d['LastName']; ?>"/>
            </div>
            <div>
                <label>Gender</label>
                <br>
				<select name="Gender" id="Gender" value="<?php echo $d['Gender']; ?>" >
                <option value='M'>M</option>
                <option value='F'>F</option>
				</select>
            </div>
            <div>
                <label>Address</label>
				<input type="text" name="address" id="address" value="<?php echo $d['Address']; ?>"/>
            </div>
            <div>
                <label>Birthdate</label>
				<input type="date" name="birthdate" id="birthdate" value="<?php echo $d['Birthday']; ?>"/>
            </div>	
            <div>
                <label>Mobile Phone</label>
				<input type="number" name="MobilePhone" id="MobilePhone" value="<?php echo $d['MobilePhone']; ?>"/>
            </div>
			<div>
				<input type="submit" value="Submit" class="tombol">
            </div>
            
        </form>
    </div>

    <?php 
    } 
    ?>

</body>

</html>