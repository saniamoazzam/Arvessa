<?php
$First = $_POST['first'];
$Last = $_POST['last'];
$Birth_Date = $_POST['birth'];
$Start_Date = $_POST['start'];
$Salary = $_POST['salary'];

$servername= "localhost";
$password = "";
$username = "root";
$dbname = "arvessa";
$connection = new mysqli($servername, $username, $password, $dbname);

$employeeID = mysqli_query($connection, "SELECT MAX(Employee_No) AS HIGH FROM Employee");
$EID = mysqli_fetch_array($employeeID);
$newID = $EID['HIGH'] + 1;

if($connection-> connect_error){
    die("Connection failed: " . $connection->connect_error);
}

$sql = "INSERT INTO Employee VALUES ('" . $newID . "','" . $First . "','" . $Last . "','" . $Birth_Date . "','" . $Start_Date . "','" . $Salary . "')";
if ($connection->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
header("Location: manShell.php");
