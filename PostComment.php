<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        include "Connect_Login_Database.php";
        session_start();
        $Username = $_SESSION['username'];

        $Comment = $_POST['comment'];
        $PostID = $_POST['postID'];
        $Name = $_POST['nama'];

        echo $Name . "<br>"; 


        if($Comment == NULL)
        {
            echo "Comment Tidak Ada";
            header("Location: Comment.php?id=$PostID");
        }
        else
        {
            $stmt = $conn->prepare("INSERT INTO comment(`PostID`, `Comment`, `Username`, `Name`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('dsss', $PostID, $Comment, $Username, $Name);
            $stmt->execute();
            
            header("Location: Comment.php?id=$PostID");
        }
    }
?>