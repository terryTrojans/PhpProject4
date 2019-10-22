<?php

/* 
 * Author: W.K Terry
 * ICT3715 Project
 * 01 October 2019
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
	
</ul>
</h2>
<center><h1>SHOW CLIENT BIOGRAPHIC'S </h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=gap_login.php"); 
	}
$con = mysqli_connect('localhost','root','ICT2613evaTeRry','pdosystemDB');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM client biographics";
$result = mysqli_query($con, $sql);
echo "<table>
<tr>
<th>c_name</th>
<th>c_surname</th>
<th>address</th>
<th>c_tel_w</th>
<th>c_tel_cell</th>
<th>c_email<th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['c_name'] . "</td>";
    echo "<td>" . $row['c_surname'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['c_tel_w'] . "</td>";
    echo "<td>" . $row['c_tel_cell'] . "</td>";
    echo "<td>" . $row['c_email'] . "</td>";
            echo "</tr>";
            }
echo "</table>";

mysqli_close($con);
?>
</body>
</html>