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
<center><h1>SHOW STOCK LEVEL</h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=man_login.php"); 
	}
$con = mysqli_connect('localhost','root','ICT2613evaTeRry','pdosystemDB');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM indicate_stock";
$result = mysqli_query($con, $sql);
echo "<table>
<tr>
<th>supplierID</th>
<th>min_level</th>
<th>stock_level</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['supplierID'] . "</td>";
    echo "<td>" . $row['min_level'] . "</td>";
    echo "<td>" . $row['stock_level'] . "</td>";
            echo "</tr>";
            }
echo "</table>";

mysqli_close($con);
?>
</body>
</html>