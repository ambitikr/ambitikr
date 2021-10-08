<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
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
$this_savory_query = "SELECT SavoryName, Stock, Cost  FROM savoryitems WHERE SavoryID = '"   .  $id  . "'";
$this_savory_result = mysqli_query($con, $this_savory_query);
$this_savory_record = mysqli_fetch_assoc($this_savory_result);

/* Savory Items Query from menu*/
$all_savory_query = "SELECT SavoryID, SavoryName FROM savoryitems";
$all_savory_result = mysqli_query($con, $all_savory_query);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title> SAVORY ITEMS</title>
    <meta charset="utf-8"
    <link rel="stylesheet" href = "css/custom-style.css"/>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <h1> WELLINGTON GIRLS COLLEGE CANTEEN</h1>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME</a></li>
            <li class="dropdown">
                <button class="dropbtn" style = "background-color: #333;font-family:georgia,garamond,serif;font-size:15px; "> MENU ⮟</button>
                <div class="dropdown-content">
                    <a href="menu.php">ALL MENU</a>
                    <a href="drinks.php">DRINKS MENU</a>
                    <a href="savoury.php">SAVORY ITEMS MENU</a>
                    <a href="sweet.php">SWEET ITEMS MENU</a>
                </div>
            <li> <a href='contacts.php'>INFORMATION</a></li>
            <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
        </ul>
    </nav>
</header>
</body>
<main>
    <div class="bg"></div>
    <h2>Search a Savoury Item</h2>

    <form action="" method="post">
        <input type="text" name='search' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
        <input type="submit" name="submit" value="Search" style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
    </form>

    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT SavoryName, Cost, Stock FROM savoryitems WHERE SavoryName LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count == 0){
            echo "There was no search results!";
        }else{
            while($row = mysqli_fetch_array($query)) {
                echo "<p> Savory Name: " . $row['SavoryName'] . "<br>";
                /*echo $row ['SavoryName'];*/
                /*echo ": $";*/
                echo "<p> Cost: $" . $row['Cost'] . "<br>";
                /*echo $row ['Cost'];*/
                echo "<p> Availability: " . $row['Stock'] . "<br>";
                /*echo " ---- Availability:";*/
                /*echo $row ['Stock'];*/
                echo"<br>";
            }
        }
    }
    ?>


    <h2>Other Savory Items</h2>

    <form name='savory_form' id='savory_form' method = 'get' action = 'savoury.php'>
        <select id = 'savory' name = 'savory' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
            <?php
            while($all_savory_record = mysqli_fetch_assoc($all_savory_result)){
                echo "<option value = '". $all_savory_record['SavoryID'] . "'>";
                echo $all_savory_record['SavoryName'];
                echo "</option>";
            }
            ?>

        </select>
        <input type='submit' name='savory_button' value='Show me the order information' style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
    </form>

    <h2>Savory Item Information</h2>

    <?php
    echo "<p> Item Name: " . $this_savory_record['SavoryName'] . "<br>";
    echo "<p> Availability: " . $this_savory_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_savory_record['Cost'] . "<br>";
    ?>
<h2>Sort Items</h2>
    <main>
        <form name="manage" action="savoury.php" method="post" align="center">
            <select name="manage" style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
                <option value="choose" class="sizing">Sort by</option>
                <option value="CostDESC">Price high to low</option>
                <option value="CostASC">price low to high</option>
                <option value="SavoryNameDESC">Savory Item A-Z</option>
                <option value="StockASC">Available to not available</option>
            </select>
            <input style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; " type="submit" value=" - Sort - " />
        </form>
    </main>
    <?php
    if (isset($_POST['manage'])){
        switch( $_POST['manage'] ){
            case 'choose':
                $query = 'SELECT SavoryID, SavoryName, Cost, Stock FROM savoryitems ORDER BY Cost DESC';
                break;
            case 'CostDESC':
                $query = 'SELECT SavoryID, SavoryName, Cost, Stock FROM savoryitems ORDER BY Cost DESC';
                break;
            case 'CostASC':
                $query = ' SELECT SavoryID, SavoryName, Cost, Stock FROM savoryitems ORDER BY cost ASC';
                break;
            case 'SavoryNameDESC':
                $query = ' SELECT SavoryID, SavoryName, Cost, Stock  FROM savoryitems ORDER BY SavoryName ASC';
                break;
            case 'StockASC':
                $query = ' SELECT SavoryID, SavoryName, Cost, Stock FROM savoryitems ORDER BY Stock DESC';
                break;
        }
    }else{
        $query = "SELECT * FROM savoryitems";
    }
    $results = mysqli_query( $con, $query );
    ?>
    </div>


    <center>
        <table border="2" class="center">
            <tr>
                <td>Savory Item Name</td>
                <td>Price($)</td>
                <td>Availability</td>
            </tr>

            <?php

            //include "ambitikr_canteen"; // Using database connection file here

            $records = mysqli_query($con, $query); // fetch data from database

            while($data = mysqli_fetch_array($records))
            {
                ?>
                <tr>
                    <td><?php echo $data['SavoryName']; ?></td>
                    <td><?php echo $data['Cost']; ?></td>
                    <td><?php echo $data['Stock']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    <h2>Information</h2>

    <table border="2">
        <tr>
            <th style="width:200">Drink Name</th>
            <th style="width:200">Image of Item</th>
            <th style="width:200">Price</th>
            <th style="width:150">Availability</th>
        </tr>
        <tr>
            <td>
                <div><u>Crackers:</u></div><br>
                <div>Ingredients: Wheat Flour, Vegetable Oil (Antioxidant (304)), Sugar, Fructose Syrup, Salt, Raising Agents (500, 341, 503), Emulsifier (Soy Lecithin)</div><br>
                <div><strong>Calories:</strong> 80</div>
            </td>
            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/2020-07-19_12_17_29_A_sample_of_Nabisco_Mini_Ritz_crackers_in_the_Dulles_section_of_Sterling%2C_Loudoun_County%2C_Virginia.jpg/300px-2020-07-19_12_17_29_A_sample_of_Nabisco_Mini_Ritz_crackers_in_the_Dulles_section_of_Sterling%2C_Loudoun_County%2C_Virginia.jpg" alt="Picture of Ritz Crackers"  width="150" height="150" class="center"></td><br>
            <td>$2.50</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Fries:</u></div><br>
                <div>Ingredients: Potato, Oil, Salt & Pepper if preferred</div><br>
                <div><strong>Calories:</strong> 312</div>
            </td>
            <td><img src="https://upload.wikimedia.org/wikipedia/commons/6/67/Fries_2.jpg" alt="Picture of Potato Fries"  width="140" height="100" class="center"</td>
            <td>$7.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>2 Minute Noodles:</u></div><br>
                <div>Ingredients: Wheat Flour, Wholemeal Flour(Contains Wheat), Tapioca Starch, Water, Mineral Salts, Vegetable Oil, Salt, Stabilisers, Vegetable Gum</div><br>
                <div><strong>Calories:</strong> 299</div>
            </td>
            <td><img src="https://p2.piqsels.com/preview/263/414/444/food-ramen-noodles-cooking-thumbnail.jpg" alt="Picture of 2 minute noodles" width="135" height="120" class="center"></td>
            <td>$3.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Popcorn: </u></div><br>
                <div>Ingredients: Popcorn, coconut oil, sea salt</div><br>
                <div><strong>Calories:</strong> 99</div>
            </td>
            <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbwqFEcjlzdCl5mcTB1A2KECleaFLisImbEw&usqp=CAU" alt="Picture of popcorn"  width="200" height="180" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Sandwich - (Veg):</u></div><br>
                <div>Ingredients:  white bread or brown, capsicum, mayo, onion, tomato, cucumber, carrot, cabbage</div><br>
                <div><strong>Calories:</strong> 139</div>
            </td>
            <td><img src="https://p1.pxfuel.com/preview/311/545/138/salad-sandwiches-lunch-bread.jpg" alt="Picture of Vegetarian Sandwich" width="100" height="150" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Sea-Salt chips:</u></div><br>
                <div>Ingredients: Potatoes, sunflower oil, sea salt</div><br>
                <div><strong>Calories:</strong> 160</div>
            </td>
            <td><img src="https://world.openfoodfacts.org/images/products/941/488/245/1149/front_fr.3.full.jpg" alt="Picture of Sea Salt Chips" width="100" height="180" class="center"></td>
            <td>$2.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Copper Kettle Salt & Vinegar Chips:</u></div><br>
                <div>Ingredients: Potatoes, sunflower oil, sea salt, vinegar</div><br>
                <div><strong>Calories:</strong> 160</div>
            </td>
            <td><img src="https://world.openfoodfacts.org/images/products/931/098/801/6063/front_en.8.full.jpg" alt="Picture of Copper Kettle Vinegar Chips" width="110" height="130" class="center"></td>
            <td>$2.00</td>
            <td>Y</td>
        </tr>

        <tr>
            <td>
                <div><u>Copper Kettle Salt:</u></div><br>
                <div>Ingredients: Potatoes, sunflower oil, sea salt </div><br>
                <div><strong>Calories:</strong> 160</div>
            </td>
            <td><img src="https://au.openfoodfacts.org/images/products/08275727/front_en.8.full.jpg" alt="Picture of Copper Kettle Salt Chip Packet" width="200" height="180" class="center"></td>
            <td>$2.00</td>
            <td>N</td>
        </tr>
    </table>

    </center>


    <?php mysqli_close($con); // Close connection ?>

</main>



