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



<html>
<head>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image:url(front_page_login.jpeg)">
<div class="header">
				<ul>
                                    <li style="float:left;border-right:none"><a href="index.php" class="logo"><img src="hcp.jpg" width="30px" height="30px"><strong> AltHealth </strong>Appointment Booking System</a></li>
                                    <li><a href="index.php">Home</a></li>
				</ul>
</div>
<form action="signup.php" method="post">
	<div class="sucontainer">
		<label><b>Client ID:</b></label><br>
		<input type="text" placeholder="ID Number" name="clientID" required><br>
	
		<label><b>Name:</b></label><br>
                <input type="text" placeholder="Name" name="c_name" required><br>
	
		<label><b>Surname</b></label><br>
                <input type="text" placeholder="Surname" name="c_surname" required><br>
		
		<label><b>Address:</b></label><br>
		<input type="text" placeholder="Address" name="address" required><br>
		
		<label><b>Code:</b></label><br>
		<input type="text" placeholder="Code" name="code" required><br>
		
		<label><b>Tel Home:</b></label><br>
                <input type="number" placeholder="Tel Home" name="c_tel_h" required><br>
                
                <label><b>Tel Work:</b></label><br>
                <input type="number" placeholder="Tel Work" name="c_tel_w" required><br>
                
                <label><b>Tel Cell:</b></label><br>
                <input type="number" placeholder="Tel Cell" name="c_tel_c" required><br>
                
                <label><b>Email:</b></label><br>
                <input type="email" placeholder="Email" name="c_email" required><br>
                
                <label><b>Reference:</b></label><br>
                <input type="text" placeholder="Enter Reference" name="c_reference" required><br>
                
                <label><b>Username:</b></label><br>
		<input type="text" placeholder="Create Username" name="username" required><br>

		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Enter Password" name="pwd" id="p1" required><br>

		<label><b>Repeat Password:</b></label><br>
		<input type="password" placeholder="Repeat Password" name="pwdr" id="p2" required><br>
		<p style="color:white">By creating an account you agree to our <a href="#" style="color:blue">Terms & Conditions</a>.</p><br>

		<div class="container" style="background-color:grey">
			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
			<button type="submit" name="signup" style="float:right">Sign Up</button>
		</div>
  </div>
<?php
function newUser()
{
		include 'pdoconnection.php';
		$clientid=$_POST['clientID'];
		$name=$_POST['c_name'];
		$surname=$_POST['c_surname'];
		$address=$_POST['address'];
		$code=$_POST['code'];
                $tel_h=$_POST['c_tel_h'];
                $tel_w=$_POST['c_tel_w'];
                $tel_cell=$_POST['c_tel_c'];
                $email=$$_POST['c_email'];
                $reference=$_POST['c_reference'];
		$username=$_POST['uname'];
		$password=$_POST['pwd'];
		$prepeat=$_POST['pwdr'];
		$sql = "INSERT INTO client (clientID, c_name, c_surname, address, code, c_tel_h, c_tel_w, c_tel_c, c_email, c_reference, uname, pwd, pwdr ) VALUES ('$clientid','$name','$surname','$address','$code', '$tel_h', '$tel_w', '$tel_cell', '$email', '$reference', '$username','$password') ";
	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to login page....</h2>";
		header( "Refresh:3; url=index.php");
	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'pdoconnection.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM client WHERE Username = '$username'";
	$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0)
		{
			echo"<b><br>Username already exists!!";
		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{
			echo"Passwords do not match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser();
		}
	
}
if(isset($_POST['signup']))
{
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['c_name']) &&!empty($_POST['clientID'])&& !empty($_POST['address']) &&!empty($_POST['c_email']) && !empty($_POST['c_tel_cell']))
			checkusername();
}
?>

</form>
</body>
</html>