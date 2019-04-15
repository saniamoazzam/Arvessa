<?php
session_start();
$emp = $_SESSION['eno'];
?>
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
        <?php
        $connection=mysqli_connect("localhost","root","","arvessa");
        // Check connection
        if (mysqli_connect_errno($connection))
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($connection, "SELECT First, Last FROM Employee Where (Employee_No = '$emp')");
        $row = mysqli_fetch_array($result);

        echo "<strong>Consultant: ";
        echo $row['First'];
        echo " ";
        echo $row['Last'];
        echo "</strong> ";
        ?>
        <p><strong><br>Booked Appointments </strong><br> <br> </p>

        <div id ="oldAppt">
            <table>
                <tr>
                    <th>Consulting</th>
                    <th>Appointment Details</th>
                    <th>Type</th>
                    <th>Cancel?</th>
                </tr>
                <tr>
                    <?php
                    $connection=mysqli_connect("localhost","root","","arvessa");
                    // Check connection
                    if (mysqli_connect_errno($connection))
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result1 = mysqli_query($connection, "SELECT * FROM Consults WHERE (Employee_No = '$emp')");

                    if (mysqli_num_rows($result1) > 0) {
                        echo "<tr>";
                        while ($row = mysqli_fetch_array($result1)) {
                            if(($row['Type'] != NULL) && ($row['Customer_ID'] != NULL)) {
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
                                    . "<a href="
                                    . "delConsultation.php?CustomerID="
                                    . $row['Customer_ID']
                                    .">Cancel</a>"
                                    . "</td>"
                                    . "</tr>";
                            }
                        }
                    }
                    ?>
                </tr>
            </table>
            <br>
        </div>

        <div id = "newAppt">
            <p><strong>Add Availability</strong><br> <br> </p>
            <table>
                <tr>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Add?</th>
                </tr>
                <tr>
                <form action="addConsultation.php" method="post">
                    <td><input type="date" name="date"> <br></td>
                    <td><input type = "text" name="time"> <br> </td>
                    <?php
                    $_SESSION['emp'] = $emp;?>
                    <td><input type="submit" value="Add"></td>
                </form>
                </tr>
            </table>
    </article>
</div>
<div id="footer">
    <div class="container">
        <p id="footer_text">Copyright 2019 INC</div>
</div>

</body>
</html>