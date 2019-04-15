<?php
session_start();
$CID = $_GET['CustomerID'];
$ENO = $_SESSION['Employee_No'];
$DATE = $_SESSION['Date'];
$TIME = $_SESSION['Time'];
$TYPE = $_SESSION['Type'];

$servername= "localhost";
$password = "";
$username = "root";
$dbname = "arvessa";
$connection = new mysqli($servername, $username, $password, $dbname);


if($connection-> connect_error){
    die("Connection failed: " . $connection->connect_error);
}

$sql = "UPDATE CONSULTS SET Customer_ID= '$CID' Where (Employee_No ='$ENO') AND (Date='$DATE') AND (TIME='$TIME') AND (Type='$TYPE')";


if ($connection->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

header("Location: custAppt.php");


