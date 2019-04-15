<?php
session_start();
$CID = $_GET['CustomerID'];

$servername= "localhost";
$password = "";
$username = "root";
$dbname = "arvessa";
$connection = new mysqli($servername, $username, $password, $dbname);


if($connection-> connect_error){
    die("Connection failed: " . $connection->connect_error);
}
$sql = "DELETE FROM Consults WHERE Customer_ID = '$CID'";

if ($connection->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

header("Location: consShell.php");


