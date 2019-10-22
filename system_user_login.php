<?php

/* 
 * This project has been modified without permision to suite the requirements as set out in the specifications of AltHealth
 * the original author is:  Girish N.Saraf girish03
 *                          Computer Sicience Engineer
 *                          Coder Web Applications
 *                          Developer Machine Learning and Neural Networking
 * 
 * 
 */

?>

<html>
<head>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image: url(equipment.jpg)">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong><?php session_start(); echo $_SESSION['username']; ?></strong></li>
				</ul>
</div>
<div class="container" style="width:100%">
	<div class="container" style="background-image:url(equipment.jpg)">
	<form method="post">
      <button type="button" onclick="window.location.href='booking.php'" style="background-color:#2B4F76">Book Appointment</button>
	  <button type="button" onclick="window.location.href='view_set_appointments.php'" style="background-color:#2B4F76">View Appointments</button>
	  <button type="submit" name="cancel" style="float:center;background-color:#2B4F76">Cancel Booking</button>
	  <button type="submit" name="logout" style="float:right;background-color:#2B4F76">Log Out</button>
	</form>
    </div>
</div>
    
<?php
if(isset($_POST['checking_tool']))
{
		include 'pdoconnection.php';
		$name=$_SESSION['user'];
		$sql = "Select * from bookinginfo where name='$name'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($rows = mysqli_fetch_assoc($result)) 
			{
				echo "Username:" . $rows["username"]."Client ID:".$rows["clientID"]."Date of Visit:".$rows["appointment_date"]."HCP Name".$rows["hcp_name"]."<br>";
			}
		} 
		else 
		{
			echo "0 results";
		}
}
if(isset($_POST['cancel']))
{
	header( "Refresh:1; url=bookingcancelation.php"); 
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:1; url=index.php"); 
}
?>
</body>
</html>

