<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_wgc_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['drink'])){
    $id = $_GET['drink'];
}else{
    $id = 1;
}

/* Drinks Query-  $this_drink_query = "SELECT DrinkN, Available, Cost  FROM drinks WHERE DrinkID = '" .  $id  . "'";*/
$this_drink_query = "SELECT DrinkN, Available, Cost  FROM drinks WHERE DrinkID = '"   .$_GET['drink']  . "'";
$this_drinks_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drinks_result);

/* Drinks Query from menu*/
$all_drinks_query = "SELECT DrinkID, DrinkN FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);
?>


<!DOCTYPE html>

<html lang="en">
<body style="background-color:#757374;">
<head>
    <title> COFFEE SHOP</title>
    <meta charset="utf-8"
    <link rel='stylesheet' type='text/css' href = 'style.css'
</head>

<body>
<header>
    <h1> WELLINGTON GIRLS COLLEGE CANTEEN</h1>
    <nav>
        <ul>
            <ul>
                <li> <a href='index.php'> HOME</a></li>
                <li class="dropdown">
                    <a href="menu.php" class="dropbtn">MENU</a>
                    <div class="dropdown-content">
                        <a href='drinks.php'>DRINKS MENU</a>
                        <a href='savoury.php'>SAVOURY ITEMS</a>
                        <a href='sweet.php'>SWEET ITEMS</a>
                    </div>
                <li> <a href='contacts.php'> INFORMATION</a></li>
                <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
            </ul>
        </ul>
    </nav>
</header>
</body>
<main>
    <div class="bg"></div>
<h2>Drink Information</h2>

    <?php
    echo "<p> Drink Name: " . $this_drink_record['DrinkN'] . "<br>";
    echo "<p> Availability: " . $this_drink_record['Available'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>


    <h3>Other Drinks</h3>
    <form name='drinks_form' id='drinks_form' method = 'get' action = 'drinks.php'>
        <select id = 'drink' name = 'drink'>
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                echo $all_drinks_record['DrinkN'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information'>
    </form>


    <style>
        h1 {text-align: center;}
        h2 {text-align: center;}
        h3 {text-align: center;}
        p {text-align: center;}
        div {text-align: center;}
        form {text-align: center;}
    </style>

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: #0992B2;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #C3CED2;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #f1f1f1;}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        li:last-child {
            border-right: none;
        }
    </style>

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Wellington_Girls_College_sign.jpg/1200px-Wellington_Girls_College_sign.jpg");

            /* Full height */
            height: 50%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</main>