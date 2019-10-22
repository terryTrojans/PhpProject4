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

<html>
<head>
<link rel="stylesheet" href="main.css">
<style>
table{
    width: 85%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 25px;
}
th{
border: 4px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "pdoconnection.php"; ?>
<body style="background-image:url(setappointment.jpg)">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong><?php session_start(); echo $_SESSION['username']; ?></strong></li>
                                        <li><a href="system_user_login.php">Home</a></li>
				</ul>
</div>
<center>
	<?php
	$username=$_SESSION['username'];
	$sql1 = "Select * from bookinginfo where username ='".$username."' order by Appointment Date desc";
			$result1=mysqli_query($conn, $sql1);  
			echo "<table>
					<tr>
					<th>Appointment Date</th>
					<th>Client ID</th>
					<th>Time From</th>
					<th>Time To</th>
                                        <th>Hcp name</th>
                                        <th>HcpID</th>
					<th>Status</th>
					<th>Booked-On</th>
                                        <th>Username</th>
					</tr>";                      
			while($row1=mysqli_fetch_array($result1))
			{
				$sql2="SELECT * from hcp where hcpID=".$row1['hcpID'];
				$result2=mysqli_query($conn,$sql2);
				while($row2=mysqli_fetch_array($result2))
				{
					
								echo "<tr>";
								echo "<td>" . $row1['appointment_date'] . "</td>";
                                                                echo "<th>" . $row1['clientID'] . "</th>";
								echo "<td>" . $row1['time_from'] . "</td>";
								echo "<td>" . $row1['time_to']. "</td>";
								echo "<td>" . $row2['hcp_name'] . "</td>";
                                                                echo "<td>" . $row1['status'] . "</td>";
   								echo "<td>" . $row1['Timestamp'] . "</td>";
                                                                echo "<td>" . $row1['username'] . "</td>";
								echo "</tr>";
						}
				}				
			
	?>
</center>
</body>
</html>

