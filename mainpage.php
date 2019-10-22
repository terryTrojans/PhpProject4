<?php

/* 
 * This project has been modified without permision to suite the requirements as set out in the specifications of AltHealth
 * the original author is:  Girish N.Saraf girish03
 *                          Computer Sicience Engineer
 *                          Coder Web Applications
 *                          Developer Machine Learning and Neural Networking
 * 
 *
 * 
 * 
 * 
 * The main page that selection will be made from by the user
 */

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="mainpage.css">
        <title>
        </title>
    </head>
    <body>
        
        <ul>
            <li class="dropdown"><font color="brown" size="10">ADMIN MODE</font></li>
            <br>
            <h2>
                 <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">GENERAL ADMIN</a>
                    <div class="dropdown-content"> 
                        <a href="Booking.php">Book Appointment</a>
                        <a href="client_biographics.php">Show Client Biographic's</a>
                        <a href="show_appointment_schedule.php">Show Appointment Schedule</a>
                    </div>
                </li>
                
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">HCP</a>
                    <div class="dropdown-content"> 
                        <a href="add_client.php">Add New Patient</a>
                        <a href="show_client.php">Show Clients</a>
                        <a href="show_appointment_schedule.php">HCP Schedule</a>
                    </div>
                </li>
                
                <li class="dropdown">    
                <a href="javascript:void(0)" class="dropbtn">MIS</a>
                <div class="dropdown-content">
                <a href="indicate_stock.php">Stock Levels</a>
                <a href="supplements_stats.php">Supplement Status</a>
                <a href="top_20_supplements.php">Top Selling Supplements</a>
                    </div>
                </li>
                
                <li>
                    <form method="post" action="mainpage.php">
                        <button type="submit" class="cancelbtn" name="logout" style="float:right; font-size: 20px"><b>Log Out</b></button>
                    </form>
                </li>
                       
            </h2>
        </ul>
     
        <br>
        <p>
    <center><h1>*********** WELCOME TO THE ADMINISTRATION PAGE ***********</h1></center>
    <br>
    
    <?php
    session_start();
    if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Refresh:1; url=index.php");
        }
    ?>
    </body>
</html>