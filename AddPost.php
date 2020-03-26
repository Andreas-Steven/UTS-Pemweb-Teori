<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        session_start();
        include "Connect_Login_Database.php";
        $UploadOk = 0;

        $Username = $_SESSION['username'];
        $JudulPost = $_POST['title'];
        $Post = $_POST['message'];

        if($_FILES["customFile"]["error"] != 4)
        {
            $TargetDir = "img/post/";
            $TargetFile = $TargetDir . basename($_FILES["customFile"]["name"]);
            $imageFileType = strtolower(pathinfo($TargetFile, PATHINFO_EXTENSION));
            $Check = getimagesize($_FILES["customFile"]["tmp_name"]);

            if($Check !== false) 
            {
                echo "File is an image - " . $Check["mime"] . ".";
                $UploadOk = 1;
            } 
            else 
            {
                echo "File is not an image.";
                $UploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $UploadOk = 0;
            }

            if($UploadOk == 1)
            {
                if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $TargetFile)) 
                {
                    echo "The file ". basename( $_FILES["customFile"]["name"]). " has been uploaded.";
                    $Image = $_FILES['customFile']['name'];

                    echo "<br>" . $Image;

                    $stmt = $conn->prepare("INSERT INTO `post` (Username, JudulPost, Post, Image) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param('ssss', $Username, $JudulPost, $Post, $Image);
                    $stmt->execute();
            
                    header("Location: Profile.php");
                } 
                else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            else
            {
                echo "Sorry, your file was not uploaded.";
            }
        }
        else if($_FILES["customFile"]["error"] == 4)
        {
            $stmt = $conn->prepare("INSERT INTO `post` (Username, JudulPost, Post) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $Username, $JudulPost, $Post);
            $stmt->execute();
    
            header("Location: Profile.php");
        }
    }
?>