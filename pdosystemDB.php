<?php

/* 
 *  Author: W.K Terry
 *  ICT3715 Project
 */


$servername = "localhost";
$username = "root";
$password = "ICT2613evaTeRry";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>