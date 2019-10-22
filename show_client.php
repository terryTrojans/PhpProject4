
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
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.css"> 
<style>
table{
    width: 75%;
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

</head>
<body background= "white">

   <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:20px"><b>Log Out</b></button>
	</form>
  </li>
	
<center><h1>SHOW CLIENT</h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=hcp_login.php"); 
	}
$con = mysqli_connect('localhost','root','ICT2613evaTeRry','pdosystemDB');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM client ";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL CLIENTS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>ClientID</th>
<th>C_name</th>
<th>C_surname</th>
<th>Address</th>
<th>Code</th>
<th>C_tel_h</th>
<th>C_tel_w</th>
<th>C_tel_cell</th>
<th>C_email</th>
<th>C_Reference</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['clientID'] . "</td>";
    echo "<td>" . $row['c_name'] . "</td>";
    echo "<td>" . $row['c_surname'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['code'] . "</td>";
    echo "<td>" . $row['c_tel_h'] . "</td>";
    echo "<td>" . $row['c_tel_w'] . "</td>";
    echo "<td>" . $row['c_tel_cell'] . "</td>";
	echo "<td>" . $row['c_email'] . "</td>";
	echo "<td>" . $row['c_reference'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>