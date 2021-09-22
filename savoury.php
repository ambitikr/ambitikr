<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_wgc_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}
if(isset($_GET['savory'])){
    $id = $_GET['savory'];
}else{
    $id = 1;
}
/* Drinks Query-  $this_drink_query = "SELECT DrinkN, Available, Cost  FROM drinks WHERE DrinkID = '" .  $id  . "'";*/
$this_savory_query = "SELECT SavoryName, Stock, Cost  FROM savoryitems WHERE SavoryID = '"   .$_GET['savory']  . "'";
$this_savory_result = mysqli_query($con, $this_savory_query);
$this_savory_record = mysqli_fetch_assoc($this_savory_result);

/* Savory Items Query from menu*/
$all_savory_query = "SELECT SavoryID, SavoryName FROM savoryitems";
$all_savory_result = mysqli_query($con, $all_savory_query);
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
            <li> <a href='index.php'> HOME</a></li>
            <li class="dropdown">
                <a href="menu.php" class="dropbtn">MENU</a>
                <div class="dropdown-content">
                    <a href='drinks.php'>DRINKS MENU</a>
                    <a href='savoury.php'>SAVOURY ITEMS</a>
                    <a href='sweet.php'>SWEET ITEMS</a>
                </div>
            <li> <a href='contacts.php'>INFORMATION</a></li>
            <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
        </ul>
    </nav>
</header>
</body>
<main>
    <div class="bg"></div>
    <h2>Savory Item Information</h2>

    <?php
    echo "<p> Item Name: " . $this_savory_record['SavoryName'] . "<br>";
    echo "<p> Availability: " . $this_savory_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_savory_record['Cost'] . "<br>";
    ?>

    <h3>Other Savory Items</h3>

    <form name='savory_form' id='savory_form' method = 'get' action = 'savoury.php'>
        <select id = 'savory' name = 'savory'>
            <?php
            while($all_savory_record = mysqli_fetch_assoc($all_savory_result)){
                echo "<option value = '". $all_savory_record['SavoryID'] . "'>";
                echo $all_savory_record['SavoryName'];
                echo "</option>";
            }
            ?>

        </select>
        <input type='submit' name='savory_button' value='Show me the order information'>
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



