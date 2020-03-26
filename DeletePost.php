<?php
    include "Connect_Login_Database.php";
    session_start();

    $ID = $_GET['id'];
    $Username = $_SESSION['username'];

    $stmt = $conn->prepare("SELECT `Username` FROM `post` WHERE `PostID` = ?");
    $stmt->bind_param('d', $ID);
    $stmt->execute();    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if($row['Username'] === $Username)
    {
        $stmt = $conn->prepare("DELETE FROM `post` WHERE `PostID` = ?");
        $stmt->bind_param('d', $ID);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("SELECT MAX( `PostID` ) FROM `post`");
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("ALTER TABLE `post` AUTO_INCREMENT=0");
        $stmt->execute();
        $stmt->close();

        header("Location: Timeline.php");
    }
    else
    {
        echo "You not autohorized to delete this post";
        header("Location: Timeline.php");
    }

    
?>