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
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "pdoconnection.php"; ?>
<body style="background-image:url(gap_login.jpg)">
	<div class="header">
		<ul>
                    <li style="float:left;border-right:none"><a href="system_user_login.php" class="logo"><img src="hcpback.jpg" width="30px" height="30px"><strong> AltHealth </strong> Appointment Booking System </a></li>
                    <li><a href="system_user_login.php">Home</a></li>
		</ul>
	
        </div>
    <form action="bookingcancelation.php" method="post">
	<div class="sucontainer">
		<label style="font-size:20px" >Select Appointment to Cancel:</label><br>
		<select name="appointment" id="appointment-list" class="demoInputBox"  style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Appointment</option>
		<?php
		session_start();
		$username=$_SESSION['username'];
		$date= date('Y-m-d');
		$sql1="SELECT * from bookinginfo where username='".$username."'and status not like 'Cancelled by Client' and appointment_date >='$date'";
                $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) {
			$sql2="select * from hcp where hcpID=".$rs["hcpID"];
			$results2=$conn->query($sql2);
                        while($rs2=$sresults2->fetch_assoc()){
			
		?>
		<option value="<?php echo $rs["Timestamp"]; ?>"><?php echo "Patient: ".$rs["clientID"]." Date: ".$rs['appointment_date']." -HCP.".$rs2["hcp_name"]." - Booked on:".$rs["Timestamp"]; ?></option>
		<?php
		}
		}
	
		?>
		</select>
		

			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
	</form>
	<?php
if(isset($_POST['submit']))
{
		$username=$_SESSION['username'];
		$timestamp=$_POST['appointment_date'];
		$updatequery="update bookinginfo set Status='Cancelled by Patient' where username='$username' and timestamp= '$timestamp'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo "Appointment Cancelled successfully..!!<br>";
							header( "Refresh:2; url=system_user_login.php");
				} 
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}
}
?>
</body>
</html>