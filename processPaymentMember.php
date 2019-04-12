<?php
session_start();

$servername= "localhost";
$password = $_SESSION['rootpassword'];
$username = "root";
$dbname = "arvessa";

$conn = new mysqli($servername, $username, $password, $dbname);

$id=$_SESSION['cid'];
//echo "Favorite color is " . $_SESSION['cid'] . ".<br>";

if($conn-> connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Billing_Address FROM Member WHERE Customer_ID='$id'";
$u = $conn->query($sql);
while($row = $u->fetch_assoc()) {
    $shipaddress= $row['Billing_Address'];
}

$sql = "SELECT Address FROM Warehouse";
$t = $conn->query($sql);
while($row = $t->fetch_assoc()) {
    $warehouseaddress= $row['Address'];
}

$today = getdate();
$d = $today['mday'];
$m = $today['mon'];
$y = $today['year'];
$date="$y-$m-$d";
$estdate=date('Y-m-d', strtotime($date. ' + 5 days'));

$sql = "SELECT Account_No FROM Member WHERE Customer_ID='$id'";
$w = $conn->query($sql);
while($row = $w->fetch_assoc()) {
    $accountid= $row['Account_No'];
}

$sql = "SELECT Total_Points, Current_Points FROM Points_Card WHERE Account_No='$accountid'";
$q = $conn->query($sql);
while($row = $q->fetch_assoc()) {
    $totalpoints= $row['Total_Points'];
    $currentpoints= $row['Current_Points'];
}

$sql = "SELECT CQuantity, Barcode, CPrice FROM Cart WHERE Customer_ID='$id'";
$res = $conn->query($sql);

if($res->num_rows <1){
    echo "empty";
}

else{
while($row = $res->fetch_assoc()) {
    $quantity= $row['CQuantity'];
    $barcode= $row['Barcode'];
    $price= $row['CPrice'];
    
    $totalpoints= $totalpoints + (($price)*5);
    $currentpoints= $currentpoints + (($price)*5);
    //echo "Favorite color is " . $newtotalpoints . ".<br>";
    //echo "Favorite color is " . $newcurrentpoints . ".<br>";
    
    $sql = "SELECT Quantity FROM Product_Online WHERE Barcode='$barcode'";
    $m = $conn->query($sql);
    while($row = $m->fetch_assoc()) {
    $originalquantity= $row['Quantity'];
    }
    
    $newquantity=$originalquantity-$quantity;
    
    $nom = mysqli_query($conn, "SELECT MAX(Transaction_No) AS High_No FROM Purchases_Online");
    $high = mysqli_fetch_array($nom);
    $transactionno = $high['High_No'] + 1;  
    
    $sql = "INSERT INTO  Purchases_Online (Customer_ID, Barcode, Address, Quantity, Transaction_No, Estimated_Date, Ship_Address) VALUES ('$id', '$barcode', '$warehouseaddress', '$quantity','$transactionno', '$estdate', '$shipaddress')";
    $re = $conn->query($sql);
    
    $sql = "UPDATE Points_Card SET Total_Points='$totalpoints', Current_Points='$currentpoints' WHERE Account_No='$accountid'";
    $y = $conn->query($sql);
    
    $sql = "UPDATE Product_Online SET Quantity='$newquantity' WHERE Barcode='$barcode'";
    $o = $conn->query($sql);

}}

$sql = "DELETE FROM Cart WHERE Customer_ID='$id'";
$r = $conn->query($sql);

header("Location: mainPage.php");

$conn->close();

?>