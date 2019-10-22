<?php

/*This project has been modified without permision to suite the requirements as set out in the specifications of AltHealth
 * the original author is:  Girish N.Saraf girish03
 *                          Computer Sicience Engineer
 *                          Coder Web Applications
 *                          Developer Machine Learning and Neural Networking
 * 
 */

?>

<!DOCTYPE html>
<html> 
    <body style="background-image: url(hcpback.jpg)">
        <link rel="stylesheet" href="main.css">
        <form action="hcp_login.php" method="post">
        <div class="header">
            
            <ul>
                <li style="float:left;border-right:none"><strong>Admin Login</strong></li>
                <li><a href="index.php">Home</a></li>
            </ul>
            
        </div>
        <div class="sucontainer">
            <label><b>Username:</b></label><br>
            <input type="text" placeholder="Enter Username" name="userName" required><br>
            
            <lable><b>Password:</b></lable><br>
            <input type="password" placeholder="Enter Password" name="userPassword" required><br>
            <br>
            
            <div clas="container" style="background-color: grey">
                    <button type="submit" name="submit" style="float:right">Log In</button>
            </div>
           
            
      <?php

/* 
 * Login page for the health care practitioner for administrational purposes
 */
      
function SignIn()
{   
    session_start();   
    {   
    if($_POST['userName']=='admin' && $_POST['userPassword']=='admin')
  
        {
            $_SESSION['userName'] = 'admin';
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
