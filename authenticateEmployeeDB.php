<?php
session_start();

$a=$_POST['employee'];

$servername= "localhost";
$password = "";
$username = "root";
$dbname = "arvessa";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Employee_No FROM Manager WHERE Employee_No='$a'";
$result = $conn->query($sql);

if($result->num_rows >0){
    $_SESSION['eno']=$a;
    header("Location: manShell.php");
 }
else{
    $sql = "SELECT Employee_No FROM Cashier WHERE Employee_No='$a'";
    $result = $conn->query($sql);
    
    if($result->num_rows >0){
        $_SESSION['eno']=$a;
        header("Location: empShell.php");
    }  
    
    else{
        $sql = "SELECT Employee_No FROM Consultant WHERE Employee_No='$a'";
        $result = $conn->query($sql);
    
        if($result->num_rows >0){
            $_SESSION['eno']=$a;
            header("Location: consShell.php");
        } 
        else{
            header("Location: employeeLogin.php");
        }
    }
}
    
$conn->close();
