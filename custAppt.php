<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="stylesCC.php"/>
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
        <div class = "dropdown">
            <button onclick="consultantDrop()" class="dropbtn">Consultants</button>
            <div id="consultantDrop" class="dropdown-content">
                <a href="#">Albus Smith</a>
                <a href="#">Layla M</a>
                <a href="#">Ella Brown</a>
            </div>

            <button onclick="dateDrop()" class="dropbtn">Date</button>
            <div id="dateDrop" class="dropdown-content">
                <a href="#">15 April</a>
                <a href="#">16 April</a>
                <a href="#">17 April</a>
                <a href="#">18 April</a>
                <a href="#">19 April</a>
            </div>

            <button onclick="searchConsult()" class="dropbtn">Search</button>
        </div>

        <div>
            <table>
                <tr>
                    <th>Consultant</th>
                    <th>Availability</th>
                    <th>Book</th>
                </tr>
                <tr>
                    <td>Albus Smith</td>
                    <td>15 April 2:00 PM</td>
                    <td><a href="#">Book</a></td>
                </tr>
                <tr>
                    <td>Layla M</td>
                    <td>15 April 3:00 PM</td>
                    <td><a href="#">Book</a></td>
                </tr>
                <tr>
                    <td>Layla M</td>
                    <td>15 April 4:00 PM</td>
                    <td><a href="#">Book</a></td>
                </tr>
                <tr>
                    <td>Ella Brown</td>
                    <td>15 April 5:00 AM</td>
                    <td><a href="#">Book</a></td>
                <tr>
                    <td>Ella Brown</td>
                    <td>16 April 9:00 AM</td>
                    <td><a href="#">Book</a></td>
                <tr>
                    <td>Layla M</td>
                    <td>16 April 9:00 AM</td>
                    <td><a href="#">Book</a></td>
                </tr>
            </table>
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
