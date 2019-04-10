<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="styles.php"/>
</head>
<body id="home">
<?php
    session_start();
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
            <li><a href="checkout.php">Cart</a></li>
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
    <article>
        <span id="popular_heading">Search Result</span>
        <Table class="product-table", cellspacing="10">
            <?php
            $category = $_GET['category'];
            $connection=mysqli_connect("localhost","root","","arvessa");
            // Check connection
            if (mysqli_connect_errno($connection))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($connection, "SELECT * FROM Product_Online WHERE Category ='$category'");
            //echo $category;
            //echo $result;
            $counter = 1;
            if (mysqli_num_rows($result) > 0) {
                echo "<tr>";
                while ($row = mysqli_fetch_array($result)) {
                    if ($counter % 3 == 1) {
                        echo "<tr></tr>";
                    }
                    echo
                        "<td>"
                        . "<a href="
                        ."productSum.php?barcode="
                        .$row['Barcode']
                        .">"
                        . "<img src="
                        . $row['Picture']
                        . "'width=180 height = 180/> "
                        . "</a>"
                        . "<br>"
                        . "<span>"
                        . $row['Name']
                        . "</span>"
                        . "<td>";

                    $counter++;
                }

                echo "</tr>";
            } else {
                echo "No Matching records are found!";
            }
            ?>
        </Table>
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
        min-height:400px;
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


</style>
</body>
</html>
