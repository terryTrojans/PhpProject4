<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
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
<ul>
<li class="dropdown"><font color="brown" size="10">ADMIN</font></li>

	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>SHOW APPOINTMENT SCHEDULE</h1><hr>
<?php
session_start();
$con = mysqli_connect('localhost','root','ICT2613evaTeRry','pdosystemDB');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM bookinginfo ";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL CLIENTS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>appointment_date</th>
<th>clientID</th>
<th>time_from</th>
<th>time_to</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
	$sql1="SELECT * from bookinginfo where clientID=".$row["clientID"];
	$result= mysqli_query($con,$sql);
while($row= mysqli_fetch_array($result))
        {
    echo "<tr>";
	echo "<td>" . $row['appointment_date'] . "</td>";
    echo "<td>" . $row['clientID']. "</td>";
	echo "<td>" . $row['time_from'] . "</td>";
    echo "<td>" . $row['time_to'] . "</td>";
    echo "</tr>";
	}
}

echo "</table>";
mysqli_close($con);
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=hcp_login"); 
	}
?>
</body>
</html>

