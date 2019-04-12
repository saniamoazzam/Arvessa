<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="stylesCS.php"/>
</head>
<body id="home">
<?php
$connection=mysqli_connect("localhost","root","","arvessa");
// Check connection
if (mysqli_connect_errno($connection))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result1 = mysqli_query($connection, "SELECT * FROM Consults AS C");
?>
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
        <p><strong>Consultant: Layla Mikel </strong><br> <br> </p>
        <div>
            <table>
                <tr>
                    <th>Consulting</th>
                    <th>Appointment Details</th>
                    <th>Type</th>
                    <th>Cancel?</th>
                </tr>
                <tr>
                    <?php
                    if (mysqli_num_rows($result1) > 0) {
                        echo "<tr>";
                        while ($row = mysqli_fetch_array($result1)) {
                            if($row['Type'] != NULL) {
                                echo
                                    "<tr>"
                                    . "<td>"
                                    . $row['Customer_ID']
                                    . "</td>"
                                    . "<td>"
                                    . $row['Date']
                                    ."<br>"
                                    . $row['Time']
                                    . "</td>"
                                    . "<td>"
                                    . $row['Type']
                                    . "</td>"
                                    . "<td>"
                                    . "<a href=\"#\">Cancel</a>"
                                    . "</td>"
                                    . "</tr>";
                            }
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
    </article>
</div>
<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
</div>

</body>
</html>
