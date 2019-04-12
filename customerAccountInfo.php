<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="styles.php"/>
</head>
<body id="home">
<div id="header">
    <div class="container">
        <ul class="menu_top">
            <li><a href="mainPage.php">Home</a></li><?php
            if (isset( $_SESSION['cid'])) {
                echo "<li>"
                    . "<a href="
                    . "custAppt.php>Consulation"
                    . "</a>"
                    . "</li>";
            }?>
        </ul>
    </div>
</div>

<div id="banner">
    <div id="search_container">
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="Search..">
        </form>
    </div>
    <div id="site_name">Arvessa</div>
    <div id="icons">
        <ul class="menu_bottom">
            <li><a href="cart.php">Cart</a></li>
            <?php
            if (isset( $_SESSION['cid'])) {
                echo "<li>"
                    . "<a href="
                    . "customerAccountInfo.php>Profile"
                    . "</a>"
                    . "</li>";
            }?>
        </ul>
    </div>
</div>

<div class="page-content">
    <?php
        session_start();
        $id= $_SESSION['cid'];
        $servername= "localhost";
        $password = $_SESSION['rootpassword'];
        $dbname = "arvessa";
        $username= "root";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn-> connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT First, Last, Email_Address, Billing_Address, Card_No, Expiry_Date, CVC, Account_No FROM Member WHERE Customer_ID='$id'";
        $result = $conn->query($sql);
    
        if($result->num_rows <1){
            //REDIRECT TO LOGIN PAGE SOMEHOW
            echo "empty";
        }
        else{
            while($row = $result->fetch_assoc()) {
            $first=$row["First"]; 
            $last=$row["Last"];
            $emailaddress=$row["Email_Address"];
            $billingaddress=$row["Billing_Address"];
            $cardno=$row["Card_No"];
            $expirydate=$row["Expiry_Date"];
            $cvc=$row["CVC"];
            $accountno=$row["Account_No"];
    }
        }
    
        $conn->close();
    
    ?>
    <article>
        <form action="updateCustomerInformation.php" method="post">
            First Name: <input type="text" name="FirstName" value="<?php echo $first; ?>" style="width:200px" .....><br>
            Last Name: <input type="text" name="LastName" value="<?php echo $last; ?>"style="width:200px" .....><br>
            Email Address: <input type="text" name="EmailAddress" value="<?php echo $emailaddress; ?>"style="width:200px" .....><br>
            Billing Address: <input type="text" name="BillingAddress" value="<?php echo $billingaddress; ?>"style="width:200px" .....><br>
            Card Number: <input type="text" name="CardNumber" value="<?php echo $cardno; ?>"style="width:200px" .....><br>
            Card Expiry Date: <input type="text" name="CardExpiryDate" value="<?php echo $expirydate; ?>"style="width:200px" .....><br>
            Card CVC: <input type="text" name="CardCVC" value="<?php echo $cvc; ?>"style="width:200px" .....><br>
            <input type="hidden" value="<?php echo $accountno; ?>" name="id" />
            <input type="submit" value="Update Information">
</form>
    </div>
</div>
    </article>
</div>

<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
    </div>
</div>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        background-color: white
        font-style: Arial;

    }


    #header {
        background-color: black;
        padding-top:20px;
        padding-bottom:20px;
        padding-left: 10px;
        width: 100%;
    }

    #banner {
        padding-top: 10px;
        padding-bottom: 10px;
        width:100%;
        display: flex;
    }

    #footer {
        background-color: black;
        color: #fff;
        padding-top: 30px;
        padding-bottom: 30px;
        padding-left: 10px;
        width:100%;

    }

    #footer_text {
        margin: 0 auto;
    }
    .container {
        width: 90%;
        margin: 0 auto;
        display:flex;
    }

    #site_name {
        color: black;
        font-size: 50px;
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
    }

    #icons {
        width: 25%;
        justify-content: center;
        align-items: center;
        display: flex;

    }


    .menu_top {
        list-style: none;
        float: right;
        margin-left:80%;

    }


    .menu_top li {
        display: inline-block;
        margin-left:30px;

    }

    .menu_top li a {
        color: white;
        text-decoration: none;
    }

    .menu_top li a:hover {
        text-decoration:underline;
    }

    .menu_bottom {
        list-style: none;
        font-size: 20px;
        align-items: center;
        vertical-align: middle;
        margin: 0 auto;
    }


    .menu_bottom li {
        display: inline-block;
        margin-left:30px;

    }

    .menu_bottom li a {
        color: black;
        text-decoration: none;
    }

    .menu_bottom li a:hover {
        text-decoration:underline;
    }



    .page-content {
        min-height:500px;
        margin: 0px;
        padding: 0px;
        padding-left: 150px;
        justify-content: left;
        align-items: left;
        display: flex;
        flex-flow: row;
    }

    #popular_heading {
        justify-content: center;
        align-items: center;
        display: flex;
        font-size: 30px;
    }

    Table.product-table{
        border: 1px transparent ;
        width:600px;
        border-collapse: separate;
        margin-top:20px;

    }

    #search_container {
        width: 25%;
        justify-content: center;
        align-items: center;
        display:flex;

    }
    
    #submit{
        width: 35%;
        font-size: 20px;
        padding:2%;
        align-content: center
    }

    #search_container input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: 1px solid lightgrey;
    }

    #search_container button {
        position: relative;
        padding: 6px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    #search_container button:hover {
        background: #ccc;
    }

    #FirstName{
        width: 35%;
        font-size: 50px;
        padding:2%;
    }

    .dropdown {
        width:25%;
        justify-content: center;
        align-items: center;
        display:inline-block;
        position: relative;
        padding-left: 7%;

    }

    .dropbtn {
        background-color: white;
        color: black;
        border: none;
        padding: 16px;
        font-size: 16px;
        text-transform: uppercase;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {text-decoration: underline}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {text-decoration: underline}


</style>
</body>
</html>
