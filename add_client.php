<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="adminmain.css">
        <title></title>
    </head>
    <body background="white">
       
        <ul>
            <li class="dropdown"><font color="brown" size="10">CLIENT ADMIN</font></li>
            <br>
       
        
        <h2>
            
            <li>
                <form method="post" action="mainpage.php">
                    <button type="submit" class="cancelbtn" name="logout" style="float: right;font-size: 23px"><b>Log Out</b></button>
                </form>
            </li>
            
         </ul>
        </h2>            
           
   
    <center><h1>Biographical Capturing</h1><hr>
            
    <b><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            
                Client ID:<input type="text" name="clientID" required>
                <br>
                Client Name:<input type="text" name="c_name" required>
                <br>
                Client Surname:<input type="text" name="c_surname" required="">
                <br>
                Address:<input type="text" name="address" required>
                <br>
                Code:<input type="text" name="code" maxlength="4" minlength="4" required>
                <br>
                Client Tel Home:<input type="text" name="c_tel_h" maxlength="10" minlength="10" required>
                <br>
                Client Tel Work:<input type="text" name="c_tel_w" maxlength="10" minlength="10" required>
                <br>
                Client Tel Cell:<input type="text" name="c_tel_cell" maxlength="10" minlength="10" required>
                <br>
                Email:<input type="text" name="c_email">
                <br>
                Reference:<input type="text" name="c_reference"><br>
                <br>
                <button type="submit" name="add_new_client">Add New Client</button>
              
    </form>
        </font></b>
    </center>
    
 <?php
session_start();
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Refresh:1; url=hcp_login.php");
}
function newclient()
{
   include 'pdoconnection.php';
            $clientID = $_POST['clientID'];
            $c_name = $_POST['c_name'];
            $c_surname = $_POST['c_surname'];
            $address = $_POST['address'];
            $code = $_POST['code'];
            $c_tel_h = $_POST['c_tel_h'];
            $c_tel_w = $_POST['c_tel_w'];
            $c_tel_cell = $_POST['c_tel_cell'];
            $c_email = $_POST['c_email'];
            $c_reference = $_POST['c_reference'];
            $sql = "INSERT INTO client (ClientID, C_name, C_surname, C_address, Code, C_tel_h, C_tel_w, C_tel_cell, C_email, C_reference) 
                                VALUES ('$clientID', '$c_name', '$c_surname', '$address', '$code', '$c_tel_h', '$c_tel_w', '$c_tel_cell', '$c_email', '$c_reference')";
            
            if(msqli_query($conn, $sql))
            {
                echo "<h2>Record capptured successfully! Redirecting to Mainpage...</h2>";
                header("Refresh:3; url=add_client.php");
            }
 else 
     {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     
 }
}
function checkclientID()
{
    include 'pdoconnetion.php';
    $clientID=$_POST['clientID'];
    $sql="SELECT * FROM client WHERE clientID = '$clientID";
    
    $result=msqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)!=0)
    {

echo"<b><br>Client Id already exist!!";
    }
 else 
   
    if(isset($_POST['Submit']))     
{
        newclient();
}

     }

     if(isset($_POST['Submit']))
     {
     if(!empty($_POST['clientID'])&&!empty($_POST['c_name'])&&!empty($_POST['c_surname'])&&!empty($_POST['adddress'])&&!empty($_POST['code'])&&!empty($_POST['c_tel_h'])
         &&!empty($_POST['c_tel_w'])&&!empty($_POST['c_tel_cell'])&&!empty($_POST['c_email'])&&!empty($_POST['c_reference']))
         checkclientID ();
     else {
         echo "EMPTY VALUES NOT ALLOWED";
         
     }
     
     }
    
?>   
    
 </body>
</html>