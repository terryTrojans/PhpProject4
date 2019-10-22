<?php


/*
 * 
 * This project has been modified without permision to suite the requirements as set out in the specifications of AltHealth
 * the original author is:  Girish N.Saraf girish03
 *                          Computer Sicience Engineer
 *                          Coder Web Applications
 *                          Developer Machine Learning and Neural Networking
 * 
 */

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body style="background-image:url(manager.jpg)">
    <div class="header">
        
        <ul>
            <li style="float:left;border-right: none"><strong><?php session_start(); ?></strong></li>
            <li><a href="index.php">Home</a></li>
        </ul>
        
    </div>
    <div class="container" style="width: 100%;background-image: url(manager.jpg)">
        <div class="container" style="background-color: white">
            <form method="post">
                <button type="button" name="change" onclick="window.location.href='bookingstatuschange.php'">Change/View Booking Status</button>
                <button type="submit" class="cancelbtn" name="logout" style="float: right">Log Out</button>
            </form>
        </div>
    </div>
    
    <?php 
    if(isset($_POST['checking']))
    {
    include 'pdoconnection.php';
    $name=$_SESSION['clientID'];
    $sql = "Select * from bookinginfo where name='$name'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($rows = msqli_fetch_assoc($result))
                {
            echo "Username:".$rows["username"]."Name:".$rows["clientID"]."Appointment Date:".$rows["appointment_date"]."<br>";
        }
    }
    else
        {
        echo "0 results";
        }
    }
    if(isset($_POST['logout']))
        {
        session_unset();
        session_destroy();
        header("Refres:1; url=index.php");
    }
    ?>
        
    </body>
</html>