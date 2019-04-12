<?php
session_start();

$a=$_POST['EmailAddress'];
$b=$_POST['Password'];

$servername= "localhost";
$password = $_SESSION['rootpassword'];
$username = "root";
$dbname = "arvessa";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Customer_ID FROM Member WHERE (Email_Address='$a') AND (Password='$b')";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $id=$row["Customer_ID"]; 
    //echo "Favorite color is " . $id . ".<br>";
}
    
if($result->num_rows <1){
    header("Location: mainLogin.php");
}
else{
    $_SESSION['cid']=$id;
   header("Location: mainPage.php");
}

$conn->close();

?>