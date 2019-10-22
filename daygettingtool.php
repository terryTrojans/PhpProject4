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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
	$string = $_POST["date"];
	$timestamp = strtotime($string);
	$compareday = date("l", $timestamp);
	$flag=0;
	if($_POST["hcpidval"]=="")
		echo "SELECT HCPID PROPERLY!!!";
	else
	{
	require_once("pdoconnection.php");
	$query ="SELECT * FROM hcp_availability WHERE hcpID = '" . $_POST["hcpidval"] . "' ";
	$results = $conn->query($query);
	while($rs=$results->fetch_assoc())
		{
		   if($rs["day"]==$compareday)
		   {
			   $flag++;
			   echo "Health Care Practicioner Available on ".$compareday;
			   break;
		   }
		}
		if($flag==0)
			echo "Health Care Practicioner Unavailable on ".$compareday;
	}
?>
	
</body>
</html>