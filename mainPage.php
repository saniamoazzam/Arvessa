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
        <span id="popular_heading">Most Popular</span>
        <Table class="food-table", cellspacing="10">
            <tr>
                <td><a href="focaccia.html"><img src="https://www.homecookingadventure.com/images/recipes/tn2_focaccia_main.jpg" width="180" height="180" alt="Food1"/>
                    </a><br>
                    <span class="food_name"> Classic Focaccia</span></td>
                <td><a href="wintercake.html"><img src="https://www.homecookingadventure.com/images/recipes/tn2_winter_cake_main.jpg" width="180" height="180" alt="Food2">
                    </a><br>
                    <span class="food_name"> Winter Cake</span></td>
                <td><img src="https://www.homecookingadventure.com/images/recipes/tn2_buche_de_noel_main.jpg" width="180" height="180" alt="Food3>">
                    <br>
                    <span class="food_name"> Coconut Buche de Noel</span></td>
            </tr>
            <tr>
                <td><img src="https://www.homecookingadventure.com/images/recipes/potato-pancakes_main.jpg" width="180px" height="180px" alt="Food4">
                    <br>
                    <span class="food_name"> Cheese Potato Pancakes </span></td>
                <td><img src="https://www.homecookingadventure.com/images/recipes/roasted-baby-potatoes.jpg" width="180px" height="180px" alt="Food5">
                    <br>
                    <span class="food_name"> Roasted Baby Potatoes </span></td>
                <td><img src="https://www.homecookingadventure.com/images/recipes/raspberry_chocolate_cups_mainimage.jpg" width="180px" height="180px" alt="Food6">
                    <br>
                    <span class="food_name"> Raspberry Chocolate Cups </span></td>
            </tr>
            <tr>
                <td><img src="https://www.homecookingadventure.com/images/recipes/chicken-lasagna-main-image.jpg" width="180px" height="180px" alt="Food7">
                    <br>
                    <span class="food_name"> Chicken Lasagna </span></td>
                <td><img src="https://www.homecookingadventure.com/images/recipes/Neapolitan_Cake_mainimage.jpg" width="180px" height="180px" alt="Food8">
                    <br>
                    <span class="food_name"> Raw Vegan Neapolitan Cake </span></td>
                <td><img src="https://www.homecookingadventure.com/images/recipes/vanilla-eclairs-main-image.jpg" width="180px" height="180px" alt="Food9">
                    <br>
                    <span class="food_name"> Vanilla Eclairs </span></td>
            </tr>
        </Table>
    </article>
</div>

<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
    </div>
</div>

</body>
</html>
