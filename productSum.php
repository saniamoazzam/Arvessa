<DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="styles.php"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body id="home">
<?php
session_start();
$barcode = $_GET['barcode'];
$connection=mysqli_connect("localhost","root","","arvessa");
// Check connection
if (mysqli_connect_errno($connection))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$customerID = mysqli_query($connection, "SELECT MAX(Customer_ID) AS High_ID FROM Customer");
$product = mysqli_query($connection, "SELECT * FROM Product_Online WHERE Barcode ='$barcode'");
$row = mysqli_fetch_array($product);
//echo $newID;


//    if (isset($_POST['quantity'])) {
//        $selected= $_POST['quantity'];
//
//    }

if (isset($_POST['submit'])){
    $quantity= $_POST['quantity'];
    $barcode = $row['Barcode'];
    $price = $row['Price'] * $quantity;
    $id = $_SESSION['ID'];
    //$sql1 = "INSERT INTO  Customer(Customer_ID) VALUES ('" . $id . "') WHERE NOT EXISTS (SELECT Customer_ID FROM Customer WHERE Customer_ID = $id)";
    $sql1 = "INSERT IGNORE INTO  Customer(Customer_ID) VALUES ('" . $id . "')";

    if (!mysqli_query($connection,$sql1))
    {
        die('Error: ' . mysqli_error($connection));
    }

    $sql = "INSERT INTO  Cart ( Customer_ID, Barcode, CQuantity, CPrice) VALUES ('" . $_SESSION['ID'] . "','" . $barcode . "','" . $quantity . "', '" . $price . "' )";



    if (!mysqli_query($connection,$sql))
    {
        die('Error: ' . mysqli_error($connection));
    }
}


    //echo "<script>alert('Success!');</script>";

//                echo '<script>
//                        $(function() {
//                        $("#prompt2").dialog();
//                         })
//                        </script>'
//                         .'<div id = "prompt2" title = "Basic Dialog">
//                        <p>on item added</p>
//</div>';

//            <script>
//                    $("#prompt").display = 'block';
//                    $("#prompt").dialog({
//                        closeOnEscape: false,
//                        open: function (event, ui) {
//                            $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
//                        },
//                        modal: true,
//                        buttons: {
//                            Ok: function () {
//                                $(this).dialog("close");
//                            }
//                        }
//                    });
//            </script>
?>

<div id="header">
    <div class="container">
        <ul class="menu_top">
            <li><a href="mainPage.php">Home</a></li>
            <li><a href="custAppt.php">Consultation</a></li>
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
            <li><?php echo
                    "<a href="
                        ."checkout.php?"
                        .">"
                         ."Cart"
                         ."</a>"?></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </div>
</div>

<div id="product">
    <div class="dropdown">
        <button class="dropbtn">Make Up</button>
        <div class="dropdown-content">
            <a href="search.php?category=Face">Face</a>
            <a href="search.php?category=Cheek">Cheek</a>
            <a href="search.php?category=Eye">Eye</a>
            <a href="search.php?category=Lip">Lip</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Skin Care</button>
        <div class="dropdown-content">
            <a href="search.php?category=Moisturizers">Moisturizers</a>
            <a href="search.php?category=Cleaners">Cleaners</a>
            <a href="search.php?category=Masks">Masks</a>
            <a href="search.php?category=Eye Care">Eye Care</a>
            <a href="search.php?category=Sun Care">Sun Care</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Fragrance</button>
        <div class="dropdown-content">
            <a href="search.php?category=Woman">Woman</a>
            <a href="search.php?category=Man">Man</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Other</button>
        <div class="dropdown-content">
            <a href="search.php?category=Shampoo">Shampoo & Conditioner</a>
            <a href="search.php?category=Hair Tools">Hair Tools</a>
            <a href="search.php?category=Makeup Brushes">Makeup Brushes</a>
            <a href="search.php?category=Accessories">Accessories</a>
        </div>
    </div>

</div>

<div class="page-content">
    <div class="container">
        <div id="product_picture"><img src=<?php echo $row['Picture']?> width="100%" height="auto"></div>
        <div id="product_info">
            <div id="name_price">
                <div id="product_name"><?php echo $row['Name']?></div>
                <div id="product_price"><?php echo $row['Price']?></div>
                <div id="add_cart">
                    <form method="post">
                    <div id="quantity">
                        <select name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

<!--                    <button id="add_basket">Add to basket</button>-->
                        <input id="add_basket" type="submit" value="Add to basket" name="submit">

                    </div>
                    </form>
                </div>
            </div>
            <div id="product_description">Description</div>
        </div>
    </div>
    <div id="prompt" title="Order Added">
        One item added to the basket
    </div>
</div>

<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
</div>
</div>

<script>
    // document.getElementById("add_basket").onclick = function() {
    //
    //     $("#prompt").display = 'block';
    //     $("#prompt").dialog({
    //         closeOnEscape: false,
    //         open: function (event, ui) {
    //             $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
    //         },
    //         modal: true,
    //         buttons: {
    //             Ok: function () {
    //                 $(this).dialog("close");
    //             }
    //         }
    //     });
    // }
</script>
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
        min-height:600px;
        margin: 0px;
        padding: 0px;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-flow: row;

    }

    #popular_heading {
        justify-content: center;
        align-items: center;
        display: flex;
        font-size: 30px;
    }

    #product_picture {
        width:30%;
        font-size: 25px;
    }
    #product_info {
        width:70%;
        display:flex;
        flex-direction:column;
    }

    #name_price{
        width:100%;
        display:flex;
    }


    #product_name {
        width: 35%;
        font-size: 20px;
        padding:2%;
    }

    #product_price {
        width:35%;
        font-size: 20px;
        padding:2%;
    }

    #add_cart {
        display:flex;
        width:30%;
        justify-content: center;
        align-items: center;

    }

    #add_cart input {
        background-color: black;
        color: white;
        border-radius: 5px;
        border: black;
        padding: 12px;
        font-size: 12px;
        text-transform: uppercase;
        margin: 10px;
        height: 40px;

    }

    #add_cart select{
        background-color: white;
        border-radius: 5px;
        padding: 12px;
        font-size: 13px;
        width:50px;
        height: 40px;
    }

    #product_description {
        font-size: 15px;
        padding:2%;
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

    #product {
        padding-top: 20px;
        width: 60%;
        display: flex;
        margin: 0 auto;
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

    #prompt {
        display: none;
    }


</style>
</body>
</html>
