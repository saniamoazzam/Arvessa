<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arvessa</title>
    <link rel="stylesheet" href="stylesCS.php"/>
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
        <div>
            <table>
                <tr>
                    <th>Consulting</th>
                    <th>Appointment Details</th>
                    <th>Type</th>
                    <th>Cancel?</th>
                </tr>
                <tr>
                    <td>Lava Girl</td>
                    <td>15 April 12:00 PM</td>
                    <td>Eye Makeup</td>
                    <td><a href="Cancel">Cancel</a> </td>
                </tr>
                <tr>
                    <td>Taylor Ki</td>
                    <td>15 April 1:00 PM</td>
                    <td>Skin care</td>
                    <td><a href="Cancel">Cancel</a> </td>
                </tr>
                <tr>
                    <td>Katie Mann</td>
                    <td>15 April 5:00 PM</td>
                    <td>Hair Care</td>
                    <td><a href="Cancel">Cancel</a> </td>
                </tr>
                <tr>
                    <td>Zach Efron</td>
                    <td>16 April 10:00 AM</td>
                    <td>Hair Care</td>
                    <td><a href="Cancel">Cancel</a> </td>
                </tr>
                <tr>
                    <td>Lilly Sprouse</td>
                    <td>17 April 1:00 PM</td>
                    <td>Eye Makeup</td>
                    <td><a href="Cancel">Cancel</a> </td>
                </tr>
                <tr>
                    <td>Dobra Nann</td>
                    <td>17 April 2:00 PM</td>
                    <td>Full Face Makeup</td>
                    <td><a href="Cancel">Cancel</a> </td>
                </tr>
                <tr>
                    <td>Zedian Apa</td>
                    <td>19 April 3:00 PM</td>
                    <td>Bold Lip Makeup</td>
                    <td><a href="Cancel">Cancel</a> </td>
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
