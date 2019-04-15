<?php
session_start();
$EN = $_SESSION['emp'];
$Time = $_POST['time'];
$Date = $_POST['date'];

$servername= "localhost";
$password = "";
$username = "root";
$dbname = "arvessa";
$connection = new mysqli($servername, $username, $password, $dbname);

if($connection-> connect_error){
    die("Connection failed: " . $connection->connect_error);
}

$sql = "INSERT INTO Consults VALUES (NULL,'" . $EN . "','" . $Time . "','" . $Date . "',NULL)";
if ($connection->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
header("Location: consShell.php");
