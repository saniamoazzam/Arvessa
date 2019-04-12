<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="stylesCA.php"/>
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
$result2 = mysqli_query($connection, "SELECT First, Last FROM Employee AS E, Consults AS Co WHERE E.Employee_No = Co.Employee_No");
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
        <div class = "dropdown">
            <button onclick="consultantDrop()" class="dropbtn">Consultants</button>
            <div id="consultantDrop" class="dropdown-content">
                <a href="#">Albus Smith</a>
                <a href="#">Layla M</a>
                <a href="#">Ella Brown</a>
            </div>
        </div>

        <div class = "dropdown">
            <button onclick="dateDrop()" class="dropbtn">Date</button>
            <div id="dateDrop" class="dropdown-content">
                <a href="#">15 April</a>
                <a href="#">16 April</a>
                <a href="#">17 April</a>
                <a href="#">18 April</a>
                <a href="#">19 April</a>
            </div>
        </div>

        <div class = "dropdown">
            <button onclick="searchConsult()" class="dropbtn">Search</button>
        </div>

        <div>
            <table>
                <tr>
                    <th>Consultant</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Type</th>
                    <th>Book?</th>
                </tr>
                <?php
                if (mysqli_num_rows($result1) > 0) {
                    echo "<tr>";
                    while ($row = mysqli_fetch_array($result1)) {
                        if($row['Type'] == NULL) {
                            echo
                                "<tr>"
                                . "<td>"
                                . $row['Employee_No']
                                . "</td>"
                                . "<td>"
                                . $row['Date']
                                . "</td>"
                                . "<td>"
                                . $row['Time']
                                . "</td>"
                                . "<td>"
                                . $row['Type']
                                . "<select>"
                                . "<option value=\"makeup\">Make-up</option> <br>"
                                . "<option value=\"skincare\">Skincare</option>"
                                . "</select>"
                                . "</td>"
                                . "<td>"
                                . "<form action=\"custAppt.php\" method=\"post\">"
                                . "<input type=\"submit\" name='book' class='btns' value='Book'> <br>"
                                . "</form>"
                                . "</td>"
                                . "</tr>";
                        }
                    }
                }
                ?>
                </tr>
            </table>
            <?php
            $connection = mysqli_connect("localhost","root","","arvessa");
            // Check connection
            if (mysqli_connect_errno($connection))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            if (isset($_POST['book'])) {
                $sql = "UPDATE CONSULTS SET Customer_ID= 3, Type=Skin-care";
            }

            ?>
        </div>
    </article>
</div>

<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
</div>

<script>
    function consultantDrop() {
        document.getElementById("consultantDrop").classList.toggle("show");
    }
    function dateDrop() {
        document.getElementById("dateDrop").classList.toggle("show");
    }
</script>

</body>
</html>
