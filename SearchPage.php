<?php
    ob_start();
    
    $USN = $_SESSION['username'];

    include "Connect_Login_Database.php";
?>

<?php?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ANTI-Social</title>
  <meta charset="utf-8">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="css/style2.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/home2.css" rel="stylesheet">

  <style>
    h2.headertekst 
    {
        text-align: center;
        margin: 0 auto;
    }
  </style>
</head>

<body>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">   
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>       
    
  <nav class="navbar navbar-light bg-white">
    <a href="HOME2.php" class="navbar-brand">Anti-social</a>
    <div class="menu">
      <ul>
        <li><a href="Profile.php">PROFILE</a></li>
        <li><?php echo "<a href='EditProfile.php?id=$USN'>EDIT PROFILE</a></li>"; ?></li>
        <li><a href="Timeline.php">TIMELINE</a></li>
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

  <!--==========================
    Get Started Section
  ============================-->
  <section id="team" class="padd-section text-center wow fadeInUp">
    <div class="container center" style="margin: 0px auto;">
      <div class="row">

      <?php
        $search = $_GET['search'];

        $Query = "SELECT `FirstName`, `LastName`, `Username`, `Image` FROM `profile` WHERE `FirstName` LIKE '%$search%' OR `LastName` LIKE '%$search%';";
        $Result = mysqli_query($conn, $Query) or die($conn);
        $Row = mysqli_num_rows($Result);

        if($Row > 0)
        {
            while($DATA = $Result->fetch_assoc())
            {
                echo "<div class='col-md-6 col-md-4 col-lg-3'>";
                echo "<div class='team-block bottom'>";
                    echo "<img src='img/profile/" . $DATA['Image'] . "' class='img-responsive' alt='img'>";
                    echo "<div class='team-content'>";
                        echo "<h4>";
                        echo $DATA['FirstName'] . " " . $DATA['LastName'];
                        echo "</h4>";
                        echo " <a href=\"ViewProfile.php?id=".$DATA['Username']."\" class='btn btn-light'>View Detail</a>";
                    echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }
        else
        {
            echo "<h2 class=\"headertekst\"><strong>Hasil Untuk " . $search . " Tidak Ada </strong></h2><br>";
        }

      ?>
      </div>
    </div>
  </section>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/modal-video/js/modal-video.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>
