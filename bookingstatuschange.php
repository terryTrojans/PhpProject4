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
<style>
table{
    width: 100%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 1px;
	font-size: 25px;
}
th{
border: 1px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 1px solid black;
	background-color: white;
    color: black;
}
</style>

<body style="background-image:url(bookingstatus.jpg)">
	<div class="header">
           
          
            <ul>
                <li style="float:left;border-right:none"><a href="system_user_login.php" class="logo"><img src="bookingstatus.jpg" width="30px" height="30px"><strong> AltHealth </strong>Appointment Booking System</a></li>
                <li><a href="managr_menu.php">Home</a></li>
		</ul>
            
       </div>
    <form action="bookingstatuschange.php" method="post">
        <div>
          
         
            
            <label style="font-size:20px"><b>Health Care Practitioner:<b></label><br>
		<select name="hcp" id="hcp-list" class="demoInputBox" style="width:100%;height:35px;border-radius:9px">
                    <option value="">Select HCP</option>
		<?php
                session_start();
                $mid=$_SESSION['mid'];
		$sql1="SELECT * FROM hcp where hcpID in(select hcpID from hcp_availability);"; 
            $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["hcpID"]; ?>"><?php echo "Mr. ".$rs["hcp_name"]; ?></option>
		<?php
		}
		?>
		</select>
           <br>
		
		<label><b>Date:</b></label><br>
		<input type="date" name="dateselected" required><br><br>
		<br>
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
			</form>
    
    <?php
    if(isset($_POST['submit']))
    {
		include 'pdoconnection.php';
		$hcpID=$_POST['hcp'];
                $mid=1;
		$dateselected=$_POST['dateselected'];
		$sql1 = "select * from bookinginfo where appointment_date='". $_POST['dateselected']."' AND hcpID= $hcpID AND MID= $mid order by Timestamp ASC";
		 $results1=$conn->query($sql1); 
			require_once("pdoconnection.php");
?>
				<form action="bookingstatuschange.php" method="post">; 
				<table>
				<tr>
				<th>User Name</th>
				<th>Hcp Name</th>
				<th>Appointment Date</th>
				<th>Timestamp</th>
				<th>Status</th>
				</tr>
<?php
			while($rs1=$results1->fetch_assoc())
			{
				echo "<tr>";
					echo  '<td><input type="text" name="username[]" id="username" value="'.$rs1["username"].'" readonly></td>'
					.'<td><input type="text" name="hcp_name[]" id="hcp_name" value="'.$rs1["hcp_name"].'" readonly></td>'
					.'<td><input type="date" name="appointment_date[]" id="appointment_date" value="'.$rs1["appointment_date"].'" readonly></td>'
					.'<td><input type="text" name="timestamp[]" id="timestamp" value="'.$rs1["Timestamp"].'" readonly></td>'
					.'<td><input type="text" name="status[]" id="status" value="'.$rs1["Status"].'"></td></tr>' ;
			}
?>		
			</table>	
			<button type="submit" style="position:center" name="submit2" value="Submit">Submit Changes</button></form>		
    <?php
    }
    require_once("pdoconnection.php");
			if(isset($_POST['submit2']))
		{
			$usrnm=$_POST["username"];
			$hcp_name=$_POST["hcp_name"];
			$appointment_date=$_POST["appointment_date"];
			$tmstmp=$_POST["timestamp"];
			$stts=$_POST["status"];
			$n=count($usrnm);
			for($j=0;$j<$n;$j++)
			{	
				$updatequery="update bookinginfo set Status='$stts[$j]' where username='$usrnm[$j]' and timestamp='$tmstmp[$j]'";
				if(mysqli_query($conn, $updatequery)) 
				{
							echo "$fnm[$j] :Status updated successfully..!!<br>";
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			echo "Redirecting.....";
			header( "Refresh:3; url=bookingstatuschange.php");
				
		}
?>
	
        
</body>
</html>

