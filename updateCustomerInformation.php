<?php

session_start();
$a=$_POST['EmailAddress'];
$b=$_POST['BillingAddress'];
$c=$_POST['FirstName'];
$d=$_POST['LastName'];
$e=$_POST['CardNumber'];
$f=$_POST['CardExpiryDate'];
$g=$_POST['CardCVC'];
$h=$_POST['id'];

$servername= "localhost";
$password = $_SESSION['rootpassword'];
$username = "root";
$dbname = "arvessa";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Member SET Email_Address='$a', Billing_Address='$b', First='$c', Last='$d', Card_No='$e', Expiry_Date='$f', CVC='$g' WHERE Account_No='$h'";

if ($conn->query($sql) == TRUE){
    echo "New record created successfully" . $h ."";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: mainPage.php");
?>