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
        <div class="tabM">
            <button class="tablinks" onclick="openCity(event, 'Purchase')">Purchase</button>
            <button class="tablinks" onclick="openCity(event, 'Return')">Return</button>
            <button class="tablinks" onclick="openCity(event, 'Redeem')">Redeem</button>
            <button class="tablinks" onclick="openCity(event, 'Store Stock')">Sore Stock</button>
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
                     Card Details: <input> <br> <br>
                     Safety Card: <input> <br> <br>
                    <button id = "btn" type="executebtn">Execute Purchase</button>
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
                    Card Details: <input> <br> <br>
                    Safety Card: <input> <br> <br>
                    <button type="returnbtn">Items to be returned</button>
            </div>
        </div>

        <div id="Redeem" class="tabcontent">
            <table>
                <tr>
                    <th>Mini-Product</th>
                    <th>Points</th>
                </tr>
                <tr>
                    <td>Mac mini sample 25C</td>
                    <td>200</td>
                </tr>
            </table>

            <div id="text" class="text">
                Total Points: <br> <br>
                Current Points after redeem: <br> <br>
                <button id = "btn" type="redeembtn">Redeem</button>
            </div>
        </div>

        <div id="Store Stock" class="tabcontent">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td>Naked 2 Eye Shadow</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Minerals Face Powder (40)</td>
                    <td>50</td>
                </tr>
            </table>

            <div id="Text" class="text">
                Total: <br> <br>
                <button id = "btn" type="stockbtn">Order Stock</button>
            </div>
        </div>

        <div id="Store Information" class="tabcontent">
            <table>
                <tr>
                    <th>Employee Details</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Start Data</th>
                    <th>Salary</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Ben Lyn</td>
                    <td>30018278</td>
                    <td>15 January 2019</td>
                    <td>$5000</td>
                    <td><a href="edit">Edit? </a> <br><a href="fire"> Delete?</a> </td>
                </tr>
            </table>

            <div id="Text" class="text">
                    <strong>Hire Employee:</strong> <br> <br>
                    Full Name <input> <br> <br>
                    Employee Number: <input> <br> <br>
                    SIN <input> <br> <br>
                    Salary: <input> <br> <br>
                    <button type="hirebtn">Hire</button>
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
</script>

</body>
</html>