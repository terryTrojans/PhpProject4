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
    <body style="background-image: url(front_page_login.jpeg)">
        <link rel="stylesheet" href="main.css">
        <div class="header">
            <ul>
                <li style="float:left; border-right:none"><a href="front_page.php" class="logo"><img src="hcp.jpg" width="45px" height="55px"<strong> AltHealth </strong>Appointment Booking System</a></li>
                <li><a href="#home">Home</a></li>
                
            </ul>
        </div>
        
        <div class="center">
            <h1>AltHealth</h1><br>
            <p style="text-align: center;color: black;font-size: 30px;top: 35%">Online Appointment Booking System</p><br>
            <button onclick="document.getElementById('id01').style.display='block'" style="position: absolute;top: 50%;left: 50%;">Login</button>  
        </div>
        
        <div class="footer">
            <ul style="position:absolute;top: 93%;background-color: black">
                <li><a href="man_login.php">Manager Login</a></li>
                <li><a href="gap_login.php">General Administrator Login</a></li>
                    
                   
            </ul>
          </div>
            
        <div id="id01" class="modal">
            
            <form class="modal-content animate" method="post" action="index.php">
                <div class="imgcontainer">
                    <span style="float: left"><h2>&nbsp&nbsp&nbsp&nbspLog In</h2></span>
                    <span onclick="document.getElementById('id01').style.display='none" class="close" title="Close Modal">&times;</span>
                </div>
                
                <div class="container">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="login">Login</button>
                    
                    <input type="checkbox" checked="checked"> Remember me 
                </div>
                
                
                <div class="container" style="background-color: #f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float:right">Don't Have one?</button>
                </div>   
            </form>
         </div>
       
        
        <div id="id02" class="modal">
            <form class="modal-content animate" action="signup.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
                </div>
                
                <div class="imgcontainer">
                    <img src="avatar.jpeg" alt="Avatar" class="avatar">
                </div>
                
                <div class="container">
                    <p style="text-align: center; font-size: 18px;"><b>Sign Up -> Choose your Date -> Place Booking</b></p>
                    <p style="text-align: center"><b>Easiest way of scheduling your appointment</b></p>
                    <p style="text-align: center"><b>Community based alternative health care option for healthy living</b></p>
                </div>
                
                <div class="container" style="background-color: #f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" name="signup" style="float: right">Sign Up</button>
                </div>                
            </form>
        </div>
        
        <script>
            //get the details (modal)
            var modal = document.getElementById('id01');
            
            // close when user click anywhere outside of the modal
            window.onclick = function(event){
                if(event.target == modal){
                    modal.style.display = "none";
                }
            }
            
            window.onclick = function(event){
                if(event.target == modal1){
                    modal1.style.display = "none";
                }
            }
            
            </script>
            <?php
            //session_start();
            $error='';
            if(isset($_POST['login'])){
                if(empty($_POST['user']) || empty($_POST['user'])){
                    $error = "Username and password is invalid";
                }
                else 
                {
                include 'pdoconnection.php';
                $username=$_POST['user'];
                $password=$_POST['user'];
                
                $query = msqli_query($conn, "SELECT * FROM client where password ='$password' AND username='$username'");
                $rows = msqli_fetch_assoc($query);
                $num=msqli_num_rows($query);
                if ($num == 1){
                    $_SESSION['username']=$rows['username'];
                    $_SESSION['user']=$rows['name'];
                    header( "Refresh:1; url=system_user_login.php");
                }
               
 else 
     {
     $error = "Username or Password is invalid";
                
            }
            msqli_close($conn);
                }
            }
        ?>
    </body>
</html>