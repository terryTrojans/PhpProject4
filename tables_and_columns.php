<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$servername = "localhost";
$username = "root";
$password = "ICT2613evaTeRry";
$dbname = "pdosystemDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
  // sql to create table
    $sql = "CREATE TABLE client (
    clientID        VARCHAR(13)     NOT NULL    UNIQUE      PRIMARY KEY, 
    c_name          VARCHAR(30)     NOT NULL,
    c_surname       VARCHAR(30)     NOT NULL,
    address         TEXT            NOT NULL,
    code            INT(4)          NOT NULL,
    c_tel_h         TEXT            NOT NULL,
    c_tel_w         TEXT            NOT NULL,
    c_tel_cell      TEXT            NOT NULL,
    c_email         TEXT            NOT NULL,
    c_reference     TEXT            NOT NULL,
    username        VARCHAR(20)     NOT NULL,
    password        VARCHAR(20)     NOT NULL
    )";#ENGIN=InnoDB   CHARSET=utf8_general_ci";

if (mysqli_query($conn, $sql)) {
    echo "Table client created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);




/*
$servername = "localhost";
$username = "root";
$password = "ICT2613evaTeRry";
$dbname = "pdosystemDB";


/* ------------------------------------------------------------------------------------------------- */
/*
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE client (
    clientID        VARCHAR(13)     NOT NULL    UNIQUE      PRIMARY KEY, 
    c_name          VARCHAR(30)     NOT NULL,
    c_surname       VARCHAR(30)     NOT NULL,
    address         TEXT            NOT NULL,
    code            INT(4)          NOT NULL,
    c_tel_h         TEXT            NOT NULL,
    c_tel_w         TEXT            NOT NULL,
    c_tel_cell      TEXT            NOT NULL,
    c_email         TEXT            NOT NULL,
    c_reference     TEXT            NOT NULL
    )";#ENGIN=InnoDB   CHARSET=utf8_general_ci";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table client created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
 $conn = null;

/* ----------------------------------------------------------------------------------------------------- */


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE reference (
    c_reference     VARCHAR(25)     NOT NULL    UNIQUE      PRIMARY KEY, 
    c_discription   TEXT     NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table reference created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* --------------------------------------------------------------------------------------------------- */



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE suppl_info (
    supplierID          VARCHAR(25)    NOT NULL    UNIQUE      PRIMARY KEY, 
    contact_person      TEXT    NOT NULL,
    tel                 TEXT    NOT NULL,
    cell                TEXT    NOT NULL,
    fax                 TEXT    NOT NULL,
    email               TEXT    NOT NULL,
    account_number      TEXT    NOT NULL,
    type                TEXT    NOT NULL,
    bankID              TEXT    NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table suppl_info created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* ----------------------------------------------------------------------------------------------------- */


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE bankInfo (
    bankID          VARCHAR(10)           NOT NULL    UNIQUE      PRIMARY KEY, 
    bank_name       VARCHAR(25)    NOT NULL,
    branch_code     TEXT           NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table bankInfo created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;



/* ------------------------------------------------------------------------------------------------------- */



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE supplements (
    supplID             VARCHAR(25)    NOT NULL    UNIQUE      PRIMARY KEY, 
    description         TEXT    NOT NULL,
    cost_excluding      TEXT    NOT NULL,
    perc_including      TEXT    NOT NULL,
    supplierID          TEXT    NOT NULL,
    min_level           INT(10) NOT NULL,
    stock_level         INT(28) NOT NULL,
    nappi_code          INT(11) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table supplements created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* --------------------------------------------------------------------------------------------------- */



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE invoice (
    inv_num             VARCHAR(10)            NOT NULL    UNIQUE,  
    inv_date            DATE            NOT NULL,
    clientID            VARCHAR(13)     NOT NULL,
    consultation_fee    DECIMAL(5,2)    NOT NULL,
    PRIMARY KEY (inv_num)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table invoice created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* ------------------------------------------------------------------------------------------------- */


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE consultationFee (
    consultation_fee        DECIMAL(5,2)    NOT NULL    UNIQUE      PRIMARY KEY, 
    description_date        DATE            NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table consultationFee created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* --------------------------------------------------------------------------------------------------- */



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE invLineItem (
    inv_num             VARCHAR(10)             NOT NULL, 
    supplID             VARCHAR(25)             NOT NULL,
    suppl_price         DECIMAL(5,2)     NOT NULL,
    quantity            INT(11)          NOT NULL,
    PRIMARY KEY (inv_num, supplID)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table invLineItem created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* ----------------------------------------------------------------------------------------------------- */



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE bookingInfo (
    username                VARCHAR(30)     NOT NULL;    
    appointment_date        DATE            NOT NULL, 
    clientID                VARCHAR(13)     NOT NULL,
    time_from               TIME            NOT NULL,
    time_to                 TIME            NOT NULL,
    hcp_name                VARCHAR(20)     NOT NULL,
    status                  VARCHAR(100)    NOT NULL,
    timestamp               DATETIME        NOT NULL,
    PRIMARY KEY (appointment_date)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table bookingInfo created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;

/*--------------------------------------------------------------------------------------------------------------------*/



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE users (
    userNumber         INT(3)             NOT NULL, 
    userName           VARCHAR(15)        NOT NULL,
    userPasword        VARCHAR(15)           NOT NULL,
    discription        VARCHAR(15)        NOT NULL,
    PRIMARY KEY (userNumber)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table users created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;


/* -------------------------------------------------------------------------------------------------------------------------- */


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE manager (
    mid                 INT(10)              NOT NULL, 
    m_name                VARCHAR(20)          NOT NULL,
    gender              VARCHAR(10)          NOT NULL,
    dob                 DATE                 NOT NULL,
    contact             TEXT(10)             NOT NULL,
    address             VARCHAR(20)          NOT NULL,
    username            VARCHAR(15)          NOT NULL,
    password            VARCHAR(15)          NOT NULL,
    
    PRIMARY KEY (mid)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table manager created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;





/* ------------------------------------------------------------------------------------------------------------------------------ */



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE hcp (
    hcpID              INT(10)              NOT NULL, 
    hcp_name            VARCHAR(20)          NOT NULL,
    gender              VARCHAR(10)          NOT NULL,
    dob                 DATE                 NOT NULL,
    experience          TEXT(40)             NOT NULL,
    Specialization      VARCHAR(40)          NOT NULL,
    contact             TEXT(10)             NOT NULL,
    username            VARCHAR(15)          NOT NULL,
    password            VARCHAR(15)          NOT NULL,
    
    PRIMARY KEY (hcpID)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table hcp created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;




/* ------------------------------------------------------------------------------------------------------------------------------- */

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE hcp_availability (
    hcpID              INT(10)              NOT NULL, 
    hcp_name            VARCHAR(20)          NOT NULL,
    day                 VARCHAR(50)          NOT NULL,
    starttime           TIME                 NOT NULL,
    endtime             TIME                 NOT NULL, 
    PRIMARY KEY (hcpID)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table hcp_availability created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;

