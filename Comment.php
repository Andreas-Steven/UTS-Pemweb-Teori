<?php
    ob_start();
    session_start();
    include "Connect_Login_Database.php";

    $Username = $_SESSION['username'];
    $PostID = $_GET['id'];

    $Query = "SELECT `FirstName`, `LastName` FROM `profile` WHERE `Username` = '$Username'";
    $Result = mysqli_query($conn, $Query) or die($conn);
                    
    while($DATA = $Result->fetch_assoc())
    {
        $Name = $DATA['FirstName'] . " " . $DATA['LastName'];
    }
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <title>ANTI-Social</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/home2.css" rel="stylesheet">

  <style>
    hr 
    {
        -moz-border-bottom-colors: none;
        -moz-border-image: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: #EEEEEE -moz-use-text-color #FFFFFF;
        border-style: solid none;
        border-width: 1px 0;
        margin: 18px 0;
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
            <li><?php echo "<a href='EditProfile.php?id=$Username'>EDIT PROFILE</a></li>"; ?>
            <li><a href="Timeline.php">TIMELINE</a></li>
            <li><a href="Login.php">LOGOUT</a></li>
		</ul>
	</div>
        <form class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>
        
    <div class="container-fluid gedf-wrapper">
        <!--<div class="row">-->
            <!--<div class="col-md-6 gedf-main">-->
                <div class="col-md-6 gedf-main" style="margin: 0 auto;  ">
                    <?php
                        $Query = "SELECT `FirstName`, `LastName`, `Image` FROM `profile` WHERE `Username` IN (SELECT `Username` FROM `post` WHERE `PostID` = $PostID);";
                        $Result = mysqli_query($conn, $Query) or die($conn);
                    
                        while($DATA = $Result->fetch_assoc())
                        {
                    ?>
                    <!--- \\\\\\\Post-->
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="45" src="img/profile/<?php echo $DATA['Image']; ?>" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0">
                                            <?php 
                                                echo $DATA['FirstName'] . " " . $DATA['LastName']; 
                                            ?>
                                        </div>
                                        <div class="h7 text-muted">
                                            <?php echo "@" . $DATA['FirstName'] . $DATA['LastName']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            }

                            $Query = "SELECT * FROM `post` WHERE `PostID` = $PostID;";
                            $Result = mysqli_query($conn, $Query) or die($conn);

                            while($RESULT = $Result->fetch_assoc())
                            {
                        ?>

                        <div class="card-body">
                            <a class="card-link" href="#">
                                <h5 class="card-title"><?php echo $RESULT['JudulPost']; ?></h5>
                            </a>

                            <p class="card-text">
                                <?php echo $RESULT['Post']; ?>
                            </p>
                        </div>

                        <?php
                            }
                        ?>

                        <?php
                            $Query = "SELECT * FROM `comment` WHERE `PostID` = $PostID";
                            $Result = mysqli_query($conn, $Query) or die($conn);

                            while($RESULT = $Result->fetch_assoc())
                            {
                        ?>
                        <!--Comment-->
                        <hr>
                        <div class="card-body" style="margin-top: 0px;">
                            <a class="card-link" href="#"><h6 class="card-title"><?php echo $RESULT['Name']; ?></h6></a>
                            <p class="card-text">
                                <?php echo $RESULT['Comment']; ?>
                            </p>
                        </div>
                        <!--Comment-->
                        <?php  
                            }
                        ?>

                        <!--Input Comment-->
                        <hr>
                        <form action="PostComment.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                        <div class="form-group">
                                            <label class="sr-only" for="comment">Comment</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="What are you thinking?"></textarea>
                                            <input type="hidden" name="postID" value="<?php echo $PostID; ?>">
                                            <input type="hidden" name="nama" value="<?php echo $Name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-toolbar justify-content-between">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Input Comment-->
                    </div>  
                </div>
            <!--</div>-->
        <!--</div>-->
    </div>
</body>
</html>