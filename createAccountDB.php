<?php
session_start();
$a=$_POST['EmailAddress'];
$b=$_POST['BillingAddress'];
$c=$_POST['FirstName'];
$d=$_POST['LastName'];
$e=$_POST['CardNumber'];
$f=$_POST['CardExpiryDate'];
$g=$_POST['CardCVC'];

$servername= "localhost";
$password = $_SESSION['rootpassword'];
$username = "root";
$dbname = "arvessa";

$conn = new mysqli($servername, $username, $password, $dbname);

$customerID = mysqli_query($conn, "SELECT MAX(Customer_ID) AS high_cid FROM Customer");
$ID = mysqli_fetch_array($customerID);
$cID= $ID['high_cid']+1;

$accountID = mysqli_query($conn, "SELECT MAX(Account_No) AS high_ano FROM Member");
$IDM = mysqli_fetch_array($accountID);
$aID= $IDM['high_ano']+1;

if($conn-> connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO Customer(Customer_ID) VALUES ('$cID')";

if ($conn->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Member (Email_Address, Billing_Address, First, Last, Card_No, Expiry_Date, CVC, Customer_ID, Account_No) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$cID', '$aID')";

if ($conn->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Points_Card (Account_No, Total_Points, Current_Points) VALUES ('$aID', 0, 0)";

if ($conn->query($sql) == TRUE){
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: mainLogin.php");
?>