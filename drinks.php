<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
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
$this_drink_query = "SELECT DrinkName, Available, Cost  FROM drinks WHERE DrinkID = '"   .  $id  . "'";
$this_drinks_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drinks_result);

/* Drinks Query from menu*/
$all_drinks_query = "SELECT DrinkID, DrinkName FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title> DRINK ITEMS</title>
    <meta charset="utf-8"
    <link rel="stylesheet" href = "css/custom-style.css"/>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">WGC CANTEEN</p>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME</a></li>
            <li class="dropdown">
                <button class="dropbtn" style = "background-color: #333;font-family:georgia,garamond,serif;font-size:15px; "> MENU ⮟</button>
                <div class="dropdown-content">
                    <a href="menu.php">ALL MENU Inc VEGAN & GLU FREE OPTIONS</a>
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

    <!-- The navigation menu -->
    <div class="navbar">
        <a href="menu.php">All Menu Inc Vegan & Gluten Free</a>
        <a class="active" href="drinks.php">Drinks Menu</a>
        <a href="savoury.php">Savory Menu</a>
        <a href="sweet.php">Sweet Menu</a>
    </div>
    <br>
<h2>Search a Drink</h2>

    <form action="" method="post">
        <input type="text" name='search' style = "font-size:17px;">
        <input type="submit" name="submit" value="Search" style = "background-color: #bbbbbb; font-size:17px; /*font-style:italic;*/ font-family:georgia,garamond,serif; text-decoration-color:white;">
    </form>
    <center>
    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT DrinkName, Cost, Available FROM drinks WHERE DrinkName LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count == 0){
            echo "There was no search results!";
        }else{
            while($row = mysqli_fetch_array($query)) {
                echo "<p> Drink Name: " . $row['DrinkName'] . "<br>";
                /*echo $row ['DrinkName'];*/
                /*echo ": $";*/
                echo "<p> Cost: $" . $row['Cost'] . "<br>";
                /*echo $row ['Cost'];*/
                echo "<p> Availablility: " . $row['Available'] . "<br>";
                /*echo " ---- Availability:";
                echo $row ['Available'];*/
                echo"<br>";
            }
        }
    }
    ?>
    </center>

    <h2>Other Drinks</h2>
    <form name='drinks_form' id='drinks_form' method = 'get' action = 'drinks.php' align="center">
        <select id = 'drink' name = 'drink' style = "background-color: white; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                echo $all_drinks_record['DrinkName'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information' style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
    </form>

    <h2>Drink Information</h2>

    <?php
    echo "<p> Drink Name: " . $this_drink_record['DrinkName'] . "<br>";
    echo "<p> Availability: " . $this_drink_record['Available'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>

    <h2>Sort Items</h2>

    <main>
        <form name="manage" action="drinks.php" method="post" align="center">
            <select name="manage" style = "font-size:15px; font-family:georgia,garamond,serif;">
                <option value="choose" >Sort by</option>
                <option value="CostDESC" >Price high to low</option>
                <option value="CostASC" >price low to high</option>
                <option value="DrinkNameDESC" >Drink A-Z</option>
                <option value="AvailableASC" >Available to not available</option>
            </select>
            <input style = "background-color: #bbbbbb; font-size:15px; font-family:georgia,garamond,serif; text-decoration-color:white;" type="submit" value=" * Sort * " />
        </form>
    </main>
    <?php
    if (isset($_POST['manage'])){
        switch( $_POST['manage'] ){
            case 'choose':
                $query = 'SELECT DrinkID, DrinkName, Cost, Available FROM drinks';
                break;
            case 'CostDESC':
                $query = 'SELECT DrinkID, DrinkName, Cost, Available FROM drinks ORDER BY Cost DESC';
                break;
            case 'CostASC':
                $query = ' SELECT DrinkID, DrinkName, Cost, Available FROM drinks ORDER BY Cost ASC';
                break;
            case 'DrinkNameDESC':
                $query = ' SELECT DrinkID, DrinkName, Cost, Available  FROM drinks ORDER BY DrinkName ASC';
                break;
            case 'AvailableASC':
                $query = ' SELECT DrinkID, DrinkName, Cost, Available FROM drinks ORDER BY Available DESC';
                break;
        }
    }else{
        $query = "SELECT * FROM drinks";
    }
    $results = mysqli_query( $con, $query );
    ?>
    </div>


<center>
        <table border="2" class="center">
        <tr>
            <td>Drink Name</td>
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
                <td><?php echo $data['DrinkName']; ?></td>
                <td><?php echo $data['Cost']; ?></td>
                <td><?php echo $data['Available']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <h2>Drinks Menu</h2>

    <table border="2">
        <tr>
            <th style="width:200">Drink Name</th>
            <th style="width:200">Image of Item</th>
            <th style="width:200">Price</th>
            <th style="width:150">Availability</th>
        </tr>
        <tr>
            <td>
                <div><u>Chocolate Milk</u></div><br>
                <div>Ingredients: Milk, chocolate syrup or chocolate powder, sweetener (such as sugar, corn syrup, high-fructose corn syrup)</div><br>
                <div><strong>Calories:</strong> 83</div>
            </td>
            <td><img src="https://live.staticflickr.com/4686/38262256334_98b90c7e68_b.jpg" alt="Chocolate Milk" width="200" height="200" class="center"></td><br>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Coke:</u></div><br>
                <div>Ingredients: coca leaves, and kola nuts (a source of caffeine)</div><br>
                <div><strong>Calories:</strong> 140</div>
            </td>
            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/15-09-26-RalfR-WLC-0098.jpg/255px-15-09-26-RalfR-WLC-0098.jpg" alt="Picture" width="120" height="200" class="center"</td>
            <td>$3.00</td>
            <td>N</td>
        </tr>
        <tr>
            <td>
                <div><u>Fanta:</u></div><br>
                <div>Ingredients: Carbonated Water, Sugar, Orange Juice from Concentrate, Citrus Fruit from Concentrate, Citric Acid, Vegetable Extracts, Sweeteners, Preservative, Malic Acid, Acidity Regulator, Stabiliser, Natural Orange</div><br>
                <div><strong>Calories:</strong> 63</div>
            </td>
            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Fanta_raspberry_330ml_can-front_PNr%C2%B00853.jpg/330px-Fanta_raspberry_330ml_can-front_PNr%C2%B00853.jpg" alt="Picture of Can of Fanta" width="100" height="180" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Flat White: </u></div><br>
                <div>Ingredients: ground espresso, milk</div><br>
                <div><strong>Calories:</strong> 120</div>
            </td>
            <td><img src="https://live.staticflickr.com/2943/15344423582_f5ba6b14df_b.jpg" alt="Picture of Flat white"  width="200" height="180" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Long Black:</u></div><br>
                <div>Ingredients: ratio of 3/4 water and 1/4 espresso, or 4/5 water 1/5th espresso</div><br>
                <div><strong>Calories:</strong> </div>
            </td>
            <td><img src="https://cdn0.woolworths.media/content/wowproductimages/large/066122.jpg" alt="Picture of Iced long black can" width="160" height="180" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>L&P:</u></div><br>
                <div>Ingredients: Carbonated Water Sugar, Food Acid, Flavour, Mineral Salts, Colour</div><br>
                <div><strong>Calories:</strong> 196</div>
            </td>
            <td><img src="https://live.staticflickr.com/4586/27200301779_827e93106b_b.jpg" alt="Picture of L&P Drink" width="180" height="160" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>
        <tr>
            <td>
                <div><u>Orange Juice:</u></div><br>
                <div>Ingredients: On Average 9-10 Squeezed Oranges</div><br>
                <div><strong>Calories:</strong> 45</div>
            </td>
            <td><img src="https://world.openfoodfacts.org/images/products/942/190/308/4019/front_fr.4.full.jpg" alt="Picture of Orange Juice" width="145" height="180" class="center"></td>
            <td>$4.00</td>
            <td>Y</td>
        </tr>

        <tr>
            <td>
                <div><u>Sprite:</u></div><br>
                <div>Ingredients:  Carbonated Water, Sugar, Citric Acid, Sweeteners, Acidity Regulator, Natural Lemon and Lime Flavourings</div><br>
                <div><strong>Calories:</strong> 39 per 100g</div>
            </td>
            <td><img src="https://world.openfoodfacts.org/images/products/544/900/000/0729/front_fr.9.full.jpg" alt="Picture of Sprite Drink" width="200" height="180" class="center"></td>
            <td>$3.00</td>
            <td>N</td>
        </tr>
        <tr>
            <td>
                <div><u>Water:</u></div><br>
                <div>Ingredients: water.</div><br>
                <div><strong>Calories: 0</strong> </div>
            </td>
            <td><img src="https://ak.picdn.net/shutterstock/videos/20516482/thumb/1.jpg" alt="Picture of Water bottle" width="195" height="130" class="center"></td>
            <td>$2.00</td>
            <td>Y</td>
        </tr>
    </table>

</center>


    <?php mysqli_close($con); // Close connection ?>

</main>