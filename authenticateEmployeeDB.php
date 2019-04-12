<?php
session_start();

$a=$_POST['cid'];

$servername= "localhost";
$password = $_SESSION['rootpassword'];
$username = "root";
$dbname = "arvessa";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Customer_ID FROM Manager WHERE Employee_No='$a'";
$result = $conn->query($sql);

if($result->num_rows >0){
    header("Location: manShell.php");
 }
else{
    $sql = "SELECT Customer_ID FROM Cashier WHERE Employee_No='$a'";
    $result = $conn->query($sql);
    
    if($result->num_rows >0){
    header("Location: empShell.php");
    }  
    
    else{
        $sql = "SELECT Customer_ID FROM Consultant WHERE Employee_No='$a'";
        $result = $conn->query($sql);
    
        if($result->num_rows >0){
            header("Location: cons.php");
        } 
        else{
            header("Location: employeeLogin.php");
        }
    }
}
    
$conn->close();

?>