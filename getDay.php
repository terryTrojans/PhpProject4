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
	if($_POST["hcpidval"])
		echo "SELECT HCPID PROPERLY!!!";
	else
	{
	require_once("pdoconnection.php");
	$query ="SELECT * FROM hcp_availability WHERE hcpID = '" . $_POST["hcpidval"];
	$results = $conn->query($query);
	while($rs=$results->fetch_assoc())
		{
		   if($rs["day"]==$compareday)
		   {
			   $flag++;
			   echo "HCP Available on ".$compareday;
			   break;
		   }
		}
		if($flag==0)
			echo "HCP Unavailable on ".$compareday;
	}
?>
	
</body>
</html>

