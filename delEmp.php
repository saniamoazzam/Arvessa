<?php
session_start();
$EN = $_GET['EmployeeNo'];

$servername= "localhost";
$password = "";
$username = "root";
$dbname = "arvessa";
$connection = new mysqli($servername, $username, $password, $dbname);


if($connection-> connect_error){
    die("Connection failed: " . $connection->connect_error);
}
$sql = "DELETE FROM Employee WHERE Employee_No = '$EN'";

if ($connection->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

header("Location: manShell.php");


