<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

/* Drinks Query*/
$all_drinks_query = "SELECT DrinkID, DrinkName FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

/* Savory Items Query*/
$all_savory_query = "SELECT SavoryID, SavoryName FROM savoryitems";
$all_savory_result = mysqli_query($con, $all_savory_query);

/* Sweet Items Query*/
$all_sweet_query = "SELECT SweetID, SweetName FROM sweets";
$all_sweet_result = mysqli_query($con, $all_sweet_query);

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
    <p></p>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">
        MENU
    </p>
    <h3><u>DRINKS</u></h3>
    <form name='drinks_form' id='drinks_form' method = 'get' action = 'drinks.php'>
        <select id = 'drink' name = 'drink'>
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                echo $all_drinks_record['DrinkName'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information'>
    </form>

    <h3><u>SAVORY ITEMS</u></h3>

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

    <h3><u>SWEET ITEMS</u></h3>

    <form name='sweet_form' id='sweet_form' method = 'get' action = 'sweet.php'>
        <select id = 'sweet' name = 'sweet'>
            <?php
            while($all_sweet_record = mysqli_fetch_assoc($all_sweet_result)){
                echo "<option value = '". $all_sweet_record['SweetID'] . "'>";
                echo $all_sweet_record['SweetName'];
                echo "</option>";
            }
            ?>

            <input type='submit' name='savory_button' value='Show me the order information'>
    </form>

/*style code for table on menu and contacts/info page */
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
    <body>

<P></P>
    <p></p>
    <p style = "font-family:georgia,garamond,serif;font-size:25px;">
        Menu
    </p>
    <center>
        <table style="width:50%">
            <tr>
                <th>Vegan Options</th>
                <th>Gluten Free Options</th>
                <th>Drink Items</th>
                <th>Savory Items</th>
                <th>Sweet Items</th>
            </tr>
            <tr>
                <td>
                    <div>Item: Oreo Chocolate Sandwich Cookies</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Gluten Free Pasta</div>
                    <div>Price: $4.00</div>
                    <div>Stock:</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Chocolate Milk</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Sea Salt chips</div>
                    <div>Price: $2.00</div>
                    <div>Stock:Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Snickers</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
            </tr>
            <tr>
                <td><div>Item: Pringles Original Potato Crisps</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Gluten Free Raspberry Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Coke</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Heartland Salt & Vinegar chips</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Lamingtons</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Ritz Original Crackers</div>
                    <div>Price: $2.50</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Gluten Free Lemon Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Fanta</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Heartland Salt chips </div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Raspberry Slice</div>
                    <div>Price: Y</div>
                    <div>Stock: $4.00</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Doritos Spicy Sweet Chilli</div>
                    <div>Price: $4.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Harvest Snaps Salt&Vinegar</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Long Black</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Crackers</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Caramel Slice</div>
                    <div>Price: Y</div>
                    <div>Stock: $4.00</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Proper Crisps</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td><div>Item: Harvest Snaps Salt</div>
                    <div>Price:</div>
                    <div>Stock:</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Flat White</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: 2 Minute Noodles</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Fudge</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Fruit Nuggets</div>
                    <div>Price: $0.50</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Harvest Snaps Chilli</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: L&P</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Sandwich(Veg)</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Lemon Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Potato Stix</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Serious Popcorn</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Orange Juice</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Popcorn</div>
                    <div>Price: $5.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Oreo Cookies</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Copper Kettle Sea Salt</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Keto Berry Cream Wafer</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Sprite</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Fries</div>
                    <div>Price: $7.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Chocolate Cupcake</div>
                    <div>Price: $6.00</div>
                    <div>Stock: N</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
            <tr>
                <td><div>Item: The Natural Fruit Jellies</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Keto Choc Hazelnut Wafer</div>
                    <div>Price:</div>
                    <div>Stock:</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td><div>Item: Water</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div></td>
                <td>
                    <div>Item: Organic Seaweed Snack</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>
                <td>
                    <div>Item: Magnum Almond Ice Cream</div>
                    <div>Price: $7.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                </td>

            </tr>
        </table>
    </center>
    </p>




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