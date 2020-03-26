<html>
    <head>
        <title>UTS Project</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/Register.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

    <body id="tubuh" style="background-image:url('Images/BGHeart.jpg')">
        <div id="wrapper" class="col-6 col-s-9" >
            <form action="Register.php" method="POST">
                <div id="FN" class="form-group ">
                    <label style="margin-left: 17px" for="FN">First Name</label>
                    <input type="text" class="form-control" placeholder="First Name" name="FN" required>
                </div>

                <div id="LN" class="form-group">
                    <label style="margin-left: 17px" for="LN">Last Name</label>
                    <input type="text" class="form-control" placeholder="Lasst Name" name="LN">
                </div>

                <div id="MP" class="form-group">
                    <label for="MP">Mobile Phone</label>
                    <input type="number" class="form-control" placeholder="Mobile Phone" name="MP" required>
                </div>

                <div id="BD" class="form-group">
                    <label for="BD">Birthday</label>
                    <input type="date" class="form-control" name="BD" required>
                </div>

                <div id="GD" class="form-group">
                    <label  for="GD">Gender</label> <br>
                    <Input type = 'Radio' Name ='gender' value= 'M'> Male 
                    <Input type = 'Radio' Name ='gender' value= 'F'> Female
                </div>

                <div id="UN" class="form-group">
                    <label style="margin-left: 17px" for="UN">Username / Email Address</label>
                    <input type="text" class="form-control" placeholder="Username / Email Address" name="UN" required>
                </div>
                <?php
                    if(isset($_COOKIE['EMAIL_ERROR']))
                    {
                        if($_COOKIE['EMAIL_ERROR'] === "Username Already Taken")
                        {
                            echo "<div class='error' style='color:red;'>";
                                echo "<lable for='ERROR'>";
                                    echo $_COOKIE['EMAIL_ERROR'];
                                echo "</lable>";
                            echo "</div>";

                            setcookie('EMAIL_ERROR', NULL, -1, "/");    
                        }
                    }
                ?>
                 <!-- <div id="EM" class="form-group"> -->
                    <!-- <label style="margin-left: 17px" for="EM">Email Address</label> -->
                    <!-- <input type="text" class="form-control" placeholder="Email Address" name="EM" > -->
                <!-- </div> -->
                <div id="PW" class="form-group">
                    <label style="margin-left: 17px" for="PW">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="PW" required>
                </div>

                <div id="CPW" class="form-group">
                    <label style="margin-left: 17px" for="CPW">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="CPW" required>
                </div>
                <?php
                    if(isset($_COOKIE['CPW_ERROR']))
                    {
                        if($_COOKIE['CPW_ERROR'] === "Success")
                        {

                        }
                        else if($_COOKIE['CPW_ERROR'] === "Password Not Match")
                        {
                            echo "<div class='error' style='color:red;'>";
                                echo "<label for='ERROR'>";
                                    echo $_COOKIE['CPW_ERROR']; 
                                echo "</lable>";
                            echo "</div>";

                            setcookie('CPW_ERROR', NULL, -1, "/");  
                        }
                    }
                ?>
                <div id="Register" class="form-group">
                    <input type="submit" class="btn btn-primary" name="Register" value="Register"/>
                </div>        
            </form>
                        <p style="text-align: right; margin-right: 37px;">Already have an account? <a href="Login.php">Login Here </a></p> 
    
        <?php
            include "Connect_Login_Database.php";

            if(isset($_POST['Register']))
            {
                $FirstName = mysqli_real_escape_string($conn, $_POST['FN']);
                $LastName = mysqli_real_escape_string($conn, $_POST['LN']);
                $MobilePhone = mysqli_real_escape_string($conn, $_POST['MP']);
                $Birthday = mysqli_real_escape_string($conn, $_POST['BD']);
                $Gender = mysqli_real_escape_string($conn, $_POST['gender']);
                $Username = mysqli_real_escape_string($conn, $_POST['UN']);
                $Password_Plaintext = mysqli_real_escape_string($conn, $_POST['PW']);
                $Confirm_Password_Plaintext = mysqli_real_escape_string($conn, $_POST['PW']);

                $Default_Image = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";

                $CekUsernameQuery = "SELECT * FROM User WHERE Username = '$Username'";
                $QUERY = mysqli_query($conn, $CekUsernameQuery) or die(mysqli_error($conn));    
                $Result = mysqli_num_rows($QUERY);

                if($Result > 0)
                {
                    setcookie('EMAIL_ERROR', "Username Already Taken", time() + (86400 * 30), "/");
                    header("location:Register.php");

                    $FirstName = NULL;
                    $LastName = NULL;
                    $MobilePhone = NULL;
                    $Birthday = NULL;
                    $Gender = NULL;
                    $Username = NULL;
                    $Password_Plaintext = NULL;
                    $Confirm_Password_Plaintext = NULL;
                }
                else
                {
                    if($Password_Plaintext != $Confirm_Password_Plaintext)
                    {

                        $FirstName = NULL;
                        $LastName = NULL;
                        $MobilePhone = NULL;
                        $Birthday = NULL;
                        $Gender = NULL;
                        $Username = NULL;
                        $Password_Plaintext = NULL;
                        $Confirm_Password_Plaintext = NULL;

                        setcookie('CPW_ERROR', "Password Not Match", time() + (86400 * 30), "/");
                        header("location:Register.php");
                    }
                    else
                    {
                        $Chipertext_Password = hash('sha256', $Password_Plaintext); //Encrypted With SHA256

                        $QUERY = "INSERT INTO User (Username, Password) VALUES ('$Username', '$Chipertext_Password')";
                        $CREATE = mysqli_query($conn, $QUERY) or die(mysqli_error($conn));   

                        $QUERY = "INSERT INTO `Profile` (`Username`, `FirstName`, `LastName`, `Gender`, `Birthday`, `MobilePhone`, `Image`) VALUES ('$Username', '$FirstName', '$LastName', '$Gender', '$Birthday', '$MobilePhone', '$Default_Image')";
                        $CREATE = mysqli_query($conn, $QUERY) or die(mysqli_error($conn));   

                        $FirstName = NULL;
                        $LastName = NULL;
                        $MobilePhone = NULL;
                        $Birthday = NULL;
                        $Gender = NULL;
                        $Username = NULL;
                        $Password_Plaintext = NULL;
                        $Confirm_Password_Plaintext = NULL;

                        header("location:HOME.php");
                    }
                }
            }
        ?>
    </body>
</html>