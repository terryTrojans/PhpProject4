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
<body style="background-image:url(hcpback.jpg)">
<link rel="stylesheet" href="main.css">
<form action="man_login.php" method="post">
	<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong> Manager Login</strong></li>
                                        <li><a href="index.php">Home</a></li>
				</ul>
	</div>
	<div class="sucontainer">
		<label><b>Username:</b></label><br>
		<input type="text" placeholder="Enter Username" name="uname" required><br>
	
		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Enter Password" name="pass" required><br><br>
		
		<div class="container" style="background-color:grey">
			<button type="submit" name="submit" style="float:right">Log In</button>
		</div>
<?php 
function SignIn() 
{ 
include 'pdoconnection.php';

session_start();
if(!empty($_POST['uname']))  
{ 
	$query = mysqli_query($conn,"SELECT * FROM manager where username = '$_POST[uname]' AND password = '$_POST[pass]'");
	$row = mysqli_fetch_array($query);
	if(!empty($row['username']) AND !empty($row['password'])) 
	{ 
		$_SESSION['username'] = $row['username'];
		$_SESSION['m_name']=$row['m_name'];
		$_SESSION['mid']=$row['mid'];
		echo "Logging you in..";
		header( "Refresh:3; url=managr_menu.php");
	} 
	else 
	{ 
		echo "Wrong Credentials!"; 
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