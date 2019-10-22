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
</head>
   
<script>

function gethcpday(val) {
	$.ajax({
	type: "POST",
	url: "gethcpday.php",
	data:'clientID='+val,
	success: function(data){
		$("#hcp-list").html(data);
	}
	});
}
function getDay(val) {
	var hcpidval=document.getElementById("hcp-list").value;
	$.ajax({
	type: "POST",
	url: "getDay.php",
	data:'date='+val+'&hcpidval='+hcpidval,
	success: function(data){
		$("#datestatus").html(data);
	}
	});
}
</script>
<body>
	<div class="header">
		<ul>
                    <li style="float:left;border-right:none"><a href="hcp_login.php" class="logo"><img src="hcp.jpg" width="45px" height="55px"><strong> AltHealth </strong>Appointment Booking System</a></li>
			<li><a href="hcp_login.php">Home</a></li>
		</ul>
            
	</div>
	<form action="booking.php" method="post">
	<div class="sucontainer" >
		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Enter First Name" name="name" required><br>
	
                <label><b>Surname:</b></label><br>
                <input type="text" placeholder="Enter Surname" name="surname"  required><br>
                    

        <label><b>Address:</b></label><br>
        <input type="text" placeholder="Physical Address" name="address" required><br>
			
        <label><b>Code:</b></label><br>
        <input type="text" placeholder="Area Code" name="code" required><br>
	
        <label><b>Tel Home:</b></label><br>
        <input type="text" placeholder="Telephone Number Home " name="c_tel_h" required><br>
         
        <label><b>Tel Work:</b></label><br>
        <input type="text" placeholder="Telephone Number Work" name="c_tel_w" required><br>
        
        <label><b>Tel Cellphone:</b></label><br>
        <input type="text" placeholder="Cellphone Number" name="c_tel_cell" required><br>
        
        <label><b>Email Address:</b></label><br>
        <input type="text" placeholder="Email Address" name="email" ><br>
        
        <label><b>Reference:</b></label><br>
        <input type="text" placeholder="Reference" name="c_reference"><br>
        
        <label style="font-size: 20px" >HCP:</label><br>
        <select id="hcp-list" name="Hcp" onchange="getDate(this.value);" style="width: 100%;height: 35px; border-radius: 9px">
            <option value="">Select Hcp</option>
        </select>
        
		<label><b>Appointment Date:</b></label><br>
		<input type="date" name="appointment_date" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required><br><br>
		<div id="datestatus"> </div>
		
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php
session_start();
if(isset($_POST['submit']))
{
		
		include 'pdoconnection.php';
		$fname=$_POST['name'];
		$surname=$_POST['surname'];
		$address=$_POST['address'];
		$code=$_POST['code'];
		$c_tel_h=$_POST['c_tel_h'];
                $c_tel_w=$_POST['c_tel_w'];
                $c_tel_cell=$_POST['c_tel_cell'];
                $email=$_POST['email'];
                $c_reference=$_POST['c_reference'];
                $hcpID=$_POST['hcpID'];
		$appointment_date=$_POST['appointment_date'];
		$status="Booking Registered.Wait for the upload";
		$timestamp=date('Y-m-d H:i:s');
		$sql = "INSERT INTO bookinginfo (Username,Name,Surname,Address,Code,c_tel_h,c_tel_w,c_tel_cell,Email,Reference,hcpID,DOV,Status,Timestamp) VALUES ('$username', '$fname','$surname','$address','$code','$c_tel_h','$c_tel_w','$c_tel_cell','$email','$c_reference', '$hcpID','$dov','$timestamp','$status') ";
		if(!empty($_POST['name'])&&!empty($_POST['surname'])&&!empty($_POST['address'])&&!empty($_POST['code'])&&!empty($_POST['c_tel_h']) &&!empty($_POST['c_tel_w']) &&!empty($_POST['c_tel_cell']) &&!empty(['email'])&&!empty($_POST['dov']))
		{
			$checkday = strtotime($dov);
			$compareday = date("l", $checkday);
			$flag=0;
			require_once("pdoconnection.php");
			$query ="SELECT * FROM hcp_availability WHERE hcpID ='" .$hcpId. "' AND hcpID='".$hcpID."'";
			$results = $conn->query($query);
			while($rs=$results->fetch_assoc())
			{
				if($rs["day"]==$compareday) 
				{
					$flag++;
					break;
				}
			}
			if($flag==0)
			{
				echo "<h2>Select another date as HCP is Unavailable on ".$compareday."</h2>";
			}
			else
			{
				if (mysqli_query($conn, $sql)) 
				{
						echo "<h2>Appointment booking successful!! Redirecting to home page....</h2>";
						header( "Refresh:2; url=hcp_login.php");
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			echo "Enter data properly!!!!";
		}
}
?>
	</form>
</body>
</html>

