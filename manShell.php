<?php
session_start();
$emp = $_SESSION['eno'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="stylesES.php"/>
</head>
<body id="home">

<div id="header">
    <div class="container">
        <ul class="menu_top">
            <li><a href="mainPage.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
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
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </div>
</div>

<div id="product">
    <div id="makeup">Make Up</div>
    <div id="skin">Skincare</div>
    <div id="fragrance">Fragrance</div>
    <div id="other">Other</div>
</div>

<div class="page-content">
    <article>
        <?php
        $connection=mysqli_connect("localhost","root","","arvessa");
        // Check connection
        if (mysqli_connect_errno($connection))
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($connection, "SELECT First, Last FROM Employee Where (Employee_No = '$emp')");
        $row = mysqli_fetch_array($result);

        echo "<strong>Manager: ";
        echo $row['First'];
        echo " ";
        echo $row['Last'];
        echo "</strong> ";
        ?>
        <div class="tabM">
            <button class="tablinks" onclick="openCity(event, 'Purchase')">Purchase</button>
            <button class="tablinks" onclick="openCity(event, 'Return')">Return</button>
            <button class="tablinks" onclick="openCity(event, 'Redeem')">Redeem</button>
            <button class="tablinks" onclick="openCity(event, 'Store Stock')" id = "defaultOpen">Store Stock</button>
            <button class="tablinks" onclick="openCity(event, 'Store Information')">Store Information</button>
        </div>

        <div id="Purchase" class="tabcontent">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td>Naked 2 Eye Shadow</td>
                    <td>2</td>
                </tr>
            </table>

            <div id="Text" class="text">
                    Total: $ <input type="text" name="amount"> <br> <br>
                    Billing Address: <input><br>
                    Card Number: <input><br>
                    Card Expiry Date: <input><br>
                    Card CVC: <input> <br> <br>
                     Email Address: <input><br> <br>
                    Employee Card: <input> <br> <br>
                    <button class="btns">Execute Purchase</button>
            </div>
        </div>

        <div id="Return" class="tabcontent">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td>Naked 2 Eye Shadow</td>
                    <td>1</td>
                </tr>
            </table>

            <div id="Text" class="text">
                    Total: $ <input type="text" name="amount"> <br> <br>
                    Billing Address: <input><br>
                    Card Number: <input><br>
                    Card Expiry Date: <input><br>
                    Card CVC: <input> <br> <br>
                    Email Address: <input><br> <br>
                    Employee Card: <input> <br> <br>
                    <button class="btns">Return Items</button>
            </div>
        </div>

        <div id="Redeem" class="tabcontent">
            <?php
            $connection=mysqli_connect("localhost","root","","arvessa");
            // Check connection
            if (mysqli_connect_errno($connection))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($connection, "SELECT * FROM Rewards");
            ?>
            <table>
                <tr>
                    <th>Mini-Product</th>
                    <th>Points Value</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    echo "<tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo
                            "<tr>"
                            . "<td>"
                            . $row['Name']
                            . "</td>"
                            . "<td>"
                            . $row['Points_Value']
                            . "</td>"
                            . "</tr>";
                    }
                }
                ?>
            </table>
            <div id="text" class="text">
                Total Points: <br> <br>
                Current Points: <br> <br>
                <button class="btns">Redeem</button>
            </div>
        </div>

        <div id="Store Stock" class="tabcontent">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity Left</th>
                    <th>Order Quantity</th>
                </tr>
            <?php
            $connection=mysqli_connect("localhost","root","","arvessa");
            // Check connection
            if (mysqli_connect_errno($connection))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($connection, "SELECT * FROM Product");
            if (mysqli_num_rows($result) > 0) {
                echo "<tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo
                        "<tr>"
                        . "<td>"
                        . $row['Name']
                        . "</td>"
                        . "<td>"
                        . $row['Quantity']
                        . "</td>"
                        . "<td>"
                        . "<input type=\"number\" class=\"quantity\" min=\"0\">"
                        . "</td>"
                        . "</tr>";
                }
                }
                ?>
            </table>
            <div id="Text" class="text">
                <form action="manShell.php" method="post">
                <button name = "order" class="btns">Order Stock</button>
                </form>
                <?php
                if (isset($_POST['order '])) {
                    echo "Your order has been sent";
                }
                ?>
            </div>
        </div>

        <div id="Store Information" class="tabcontent">
            <table>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Start Date</th>
                    <th>Salary</th>
                    <th></th>
                </tr>
                <?php
                $connection=mysqli_connect("localhost","root","","arvessa");
                // Check connection
                if (mysqli_connect_errno($connection))
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $result1 = mysqli_query($connection, "SELECT * FROM Employee");
                if (mysqli_num_rows($result1) > 0) {
                    echo "<tr>";
                    while ($row = mysqli_fetch_array($result1)) {
                        echo
                            "<tr>"
                            . "<td>"
                            . $row['Employee_No']
                            . "</td>"
                            . "<td>"
                            . $row['First']
                            . " "
                            . $row['Last']
                            . "</td>"
                            . "<td>"
                            . $row['Birth_Date']
                            . "</td>"
                            . "<td>"
                            . $row['Start_Date']
                            . "</td>"
                            . "<td>"
                            . $row['Salary']
                            . "</td>"
                            . "<td>"
                            . "<a href=\"#\">Edit</a> <br>"
                            . "<a href="
                            . "delEmp.php?EmployeeNo="
                            . $row['Employee_No']
                            .">Delete</a>"
                            . "</td>"
                            . "</tr>";
                    }
                }
                ?>
            </table>

            <div id="Text" class="text">
                <form action="addEmp.php" method="post">
                <strong>Hire Employee:</strong> <br> <br>
                First Name: <input type="text" name="first"> Last: <input type="text" name="last"> <br> <br>
                Birth date: <input type = "date" name="birth"> <br> <br>
                Start date: <input type = "date" name="start"> <br> <br>
                Salary: <input type="number" name="salary"> <br> <br>
                <input type="submit" class="btns" value="Hire">
                </form>
            </div>
        </div>
    </article>
</div>

<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
</div>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>

</body>
</html>