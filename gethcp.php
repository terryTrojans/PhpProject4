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
        <meta http-equiv="Content_Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>
    <script type="text/javascript">//alert("sdfsd");</script>
    <body>
        <?php
        require_once("pdoconnection.php");
                $query = "SELECT distinct hcpID FROM hcp_availability WHERE hcpID = '" . $_POST["hcpid"] . "'";
                $results = $conn->query($query);
        ?>
    <option value="">Select HCP</option>
    <?php
    while($rs=$results->fetch_assoc()){
        $query1="SELECT ditinct Name from hcp where hcpID=".$rs["hcpID"];
        $result1=$conn->query($query1);
        while($rs1=$result1->fetch_assoc())
        {
    ?>  
    <option value="<?php echo $rs["hcpID"]; ?>"><?php echo $rs["hcpID"].":".$rs1["Name"]; ?></option>
        <?php
    }
    }
?>
    </body>
</html>

