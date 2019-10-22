<?php

/* 
 * 
 * This project has been modified without permision to suite the requirements as set out in the specifications of AltHealth
 * the original author is:  Girish N.Saraf girish03
 *                          Computer Sicience Engineer
 *                          Coder Web Applications
 *                          Developer Machine Learning and Neural Networking
 * 
 * 
 * 
 * Login page for the health care practitioner to view, make appointments and all administrative duties 
 */
      

?>

<!DOCTYPE html>
<html>
    <body style="background-image: url(gap_background.jpg)">
        <link rel="stylesheet" href="main.css">
        <form action="gap_login.php" method="post">
            <div class="header">
                
                <ul>
                    <li style="float:left;border-right:none"><strong>GA Login</strong></li><br>
                    <li><a href="front_page.php">Home</a></li>
                </ul>
            </div>
            
            <div class="sucontainer">
                <label><b>Username:</b></label><br>
                <input type="text" placeholder="Enter Username" name="username" required><br>
                
                <label><b>Password:</b></label><br>
                <input type="password" placeholder="Enter Password" name="password" required><br>
                
                
                <div class="container" style="background-color:grey">
                    <button type="submit" name="submit" style="float:right;">Log In</button>
                </div>
                
              <?php


function SignIn()
{ 
    session_start();
    {
        if($_POST['username'] =='admin' && $_POST['password'] == 'admin')
      
        {
            $_SESSION['username'] = 'admin';
            echo "Logging in...";
            header("Refresh:3; url=mainpage.php");
          
        }
    
    else {
        
        echo "Credentials invalid!";
    }
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}

?>         
                
    </body>
</html>

