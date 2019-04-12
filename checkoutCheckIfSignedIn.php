<?php
session_start();

if(!isset($_SESSION['cid'])){
    header("Location: proceedToCheckout.php");
}
else{
   header("Location: processPaymentMember.php");
}

?>