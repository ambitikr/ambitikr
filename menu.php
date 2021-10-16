<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database ";
}

if(isset($_GET['drink'])){
    $id = $_GET['drink'];
}else{
    $id = 1;
}

/* Drinks Query*/
$all_drinks_query = "SELECT DrinkID, DrinkName FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

/* Drinks Query-  $this_drink_query = "SELECT DrinkN, Available, Cost  FROM drinks WHERE DrinkID = '" .  $id  . "'";*/
$this_drink_query = "SELECT DrinkName, Available, Cost  FROM drinks WHERE DrinkID = '"   .  $id  . "'";
$this_drinks_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drinks_result);


if(isset($_GET['savory'])){
    $id = $_GET['savory'];
}else{
    $id = 1;
}
/* Savory Items Query*/
$all_savory_query = "SELECT SavoryID, SavoryName FROM savoryitems";
$all_savory_result = mysqli_query($con, $all_savory_query);

/* From Savory page*/
$this_savory_query = "SELECT SavoryName, Stock, Cost  FROM savoryitems WHERE SavoryID = '"   .  $id  . "'";
$this_savory_result = mysqli_query($con, $this_savory_query);
$this_savory_record = mysqli_fetch_assoc($this_savory_result);

if(isset($_GET['sweet'])){
    $id = $_GET['sweet'];
}else{
    $id = 1;
}
/* Sweet Items Query*/
$all_sweet_query = "SELECT SweetID, SweetName FROM sweets";
$all_sweet_result = mysqli_query($con, $all_sweet_query);

/* Sweets Query*/
$this_sweet_query = "SELECT SweetName, Stock, Cost  FROM sweets WHERE SweetID  = '"   .  $id  . "'";
$this_sweet_result = mysqli_query($con, $this_sweet_query);
$this_sweet_record = mysqli_fetch_assoc($this_sweet_result);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title> WGC CANTEEN MENU</title>
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
    <p></p>
    <!-- The navigation menu -->
    <div class="navbar">
        <a class="active" href="menu.php">All Menu Inc Vegan & Gluten Free</a>
        <a href="drinks.php">Drinks Menu</a>
        <a href="savoury.php">Savory Menu</a>
        <a href="sweet.php">Sweet Menu</a>

    </div>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">
        MENU
    </p>
    <h3><u>DRINKS</u></h3>
    <form name='drinks_form' id='drinks_form' method = 'get' action = 'menu.php'>
        <select id = 'drink' name = 'drink' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
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

    <?php
    echo "<p> Drink Name: " . $this_drink_record['DrinkName'] . "<br>";
    echo "<p> Availability: " . $this_drink_record['Available'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>

    <h3><u>SAVORY ITEMS</u></h3>

    <form name='savory_form' id='savory_form' method = 'get' action = 'menu.php'>
        <select id = 'savory' name = 'savory' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
            <?php
            while($all_savory_record = mysqli_fetch_assoc($all_savory_result)){
                echo "<option value = '". $all_savory_record['SavoryID'] . "'>";
                echo $all_savory_record['SavoryName'];
                echo "</option>";
            }
            ?>

        </select>
        <input type='submit' name='savory_button' value='Show me the Savory Item information' style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
    </form>

    <?php
    echo "<p> Item Name: " . $this_savory_record['SavoryName'] . "<br>";
    echo "<p> Availability: " . $this_savory_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_savory_record['Cost'] . "<br>";
    ?>


    <h3><u>SWEET ITEMS</u></h3>

    <form name='sweet_form' id='sweet_form' method = 'get' action = 'menu.php'>
        <select id = 'sweet' name = 'sweet' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
            <?php
            while($all_sweet_record = mysqli_fetch_assoc($all_sweet_result)){
                echo "<option value = '". $all_sweet_record['SweetID'] . "'>";
                echo $all_sweet_record['SweetName'];
                echo "</option>";
            }
            ?>

            <input type='submit' name='savory_button' value='Show me the Sweet Item information' style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
    </form>

    <?php
    echo "<p> Item Name: " . $this_sweet_record['SweetName'] . "<br>";
    echo "<p> Availability: " . $this_sweet_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_sweet_record['Cost'] . "<br>";
    ?>

    <p></p>
    <p style = "font-family:georgia,garamond,serif;font-size:28px;">
        All Our Items
    </p>
    <center>
        <table style="width:75%" border="2" class="center">
            <tr>
                <th>Vegan Options</th>
                <th>Gluten Free Options</th>
                <th>Drink Items</th>
                <th>Savory Items</th>
                <th>Sweet Items</th>
            </tr>
            <tr>
                <td>
                    <div>Item: Vegan Pasta</div>
                    <div>Price: $4.00</div>
                    <div>Stock:</div>
                    <div>Calories: 580</div>
                    <div>Ingredients: grade pasta flour, semolina four, olive oil, water, salt</div>
                    <div><img src="pasta.JPG" alt="Vegan Pasta" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Oreo Chocolate Sandwich Cookies</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div><img src="glutefree_oreos.JPG" alt="Oreo Chocolate Sandwich Cookies" width="100" height="100"></div>
                </td>

                <td>
                    <div>Item: Chocolate Milk</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 139</div>
                    <div>Ingredients: Milk, Whittaker's Creamy Milk Chocolate, (Sugar, Milk Powder, Cocoa Solids, Vanilla Flavour), Cocoa Powder</div>
                    <div><img src="chocolate_milk.JPG" alt="Chocolate Milk" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Sea Salt chips</div>
                    <div>Price: $2.00</div>
                    <div>Stock:Y</div>
                    <div>Calories: 160</div>
                    <div>Ingredients: Potatoes, sunflower oil, sea salt</div>
                    <div><img src="seasalt.JPG" alt="Picture of Sea salt chips" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Snickers</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 57grams</div>
                    <div>Ingredients: white sugar, sweet milk chocolate, corn syrup, peanuts, milk condensed with sugar, coconut oil, malted milk, whites of eggs and salt</div>
                    <div><img src="snickers.JPG" alt="Picture of Snickers bar" width="100" height="100"></div>
                </td>
            </tr>
            <tr>
                <td><div>Item: Pringles Original Potato Crisps</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 150</div>
                    <div>Ingredients: Dehydrated Potato, Vegetable Oils, Wheat Starch, Rice Flour, Emulsifier, Maltodextrin, Salt, Food Acid </div>
                    <div><img src="pringles.JPG" alt="Picture of Pringles" width="100" height="100"></div>
                </td>

                <td><div>Item: Gluten Free Raspberry Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 430</div>
                    <div>Ingredients: ground almonds, desiccated coconut, gluten free plain flour, Chelsea Caster Sugar, (125g) unsalted butter, melted, egg yolks, cold water, cup raspberry jam, frozen raspberries, Chelsea Icing Sugar</div>
                    <div><img src="glutenfree_rasp.JPG" alt="Picture of Gluten Free Raspberry Slice" width="100" height="100"></div>
                </td>
                <td><div>Item: Coke</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 140</div>
                    <div>Ingredients: coca leaves, and kola nuts (a source of caffeine)</div>
                    <div><img src="coke.JPG" alt="Picture" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Heartland Salt & Vinegar chips</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 40g per serving</div>
                    <div>Ingredients: Potatoes, High Oleic Sunflower Oil, Canola Oil , Acidity Regulators (262, 330), Salt, Sugar, Flavour Enhancer (621), Dextrose (Maize), Maize Starch, Natural Flavour</div>
                    <div><img src="heartland_s&v.JPG" alt="Picture of Heartland Salt and vinegar chips" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Lamingtons</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 187</div>
                    <div>Ingredients: self-raising flour, plain flour, wheaten cornflour, eggs, at room temperature, Chelsea Raw Caster Sugar, boiling water, butter, shredded coconut (for rolling pieces in)</div>
                    <div><img src="lamingtons.JPG" alt="Picture of Lamingtons" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Ritz Original Crackers</div>
                    <div>Price: $2.50</div>
                    <div>Stock: Y</div>
                    <div>Calories: 80</div>
                    <div>Ingredients: Wheat Flour, Vegetable Oil (Antioxidant (304)), Sugar, Fructose Syrup, Salt, Raising Agents (500, 341, 503), Emulsifier (Soy Lecithin)</div>
                    <div><img src="ritz_crackers.JPG" alt="Picture of Ritz cracker" width="100" height="100"></div>
                </td>
                <td><div>Item: Gluten Free Lemon Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 174</div>
                    <div><img src="glutenfree_lem.JPG" alt="Picture of Gluten Free Lemon Slice" width="100" height="100"></div>
                </td>
                <td><div>Item: Fanta</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 63</div>
                    <div>Ingredients: Carbonated Water, Sugar, Orange Juice from Concentrate, Citrus Fruit from Concentrate, Citric Acid, Vegetable Extracts, Sweeteners, Preservative, Malic Acid, Acidity Regulator, Stabiliser, Natural Orange</div>
                    <div><img src="fanta.JPG" alt="Picture of Can of Fanta" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Heartland Salt chips </div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 215</div>
                    <div>Ingredients: Potatoes, High Oleic Sunflower Oil, Canola Oil , Salt</div>
                    <div><img src="heartland_salt.JPG" alt="Picture of Heartland Salt chips" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Raspberry Slice</div>
                    <div>Price: Y</div>
                    <div>Stock: $4.00</div>
                    <div>Calories: 53 in 100 grams</div>
                    <div>Ingredients: Sugar, Wheat Flour, Raspberries, Butter, Margarine, Water, Milk Solids, Humectant, Raising Agents, Salt, Flavour, Emulsifier, Thickener, Stabilisers, Food Acids, Preservative, Natural Colour</div>
                    <div><img src="rasp_slice.JPG" alt="Picture of Raspberry Slice" width="100" height="100"></div>
                </td>
            </tr>
            <tr>
                <td><div>Item: Doritos Spicy Sweet Chilli</div>
                    <div>Price: $4.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 140</div>
                    <div>Ingredients: Corn, Vegetable Oil (Corn, Canola, and/or Sunflower Oil), Salt, Sugar, Monosodium Glutamate, Fructose, Sodium Diacetate, Soy Sauce, Onion Powder, Maltodextrin, Hydrolyzed Soy Protein, Hydrolyzed Corn Protein, Garlic Powder, Torula Yeast, Malic Acid, Extractives of Paprika, Spice</div>
                    <div><img src="doritos.JPG" alt="Picture of Bag of Doritos" width="100" height="100"></div>
                </td>
                <td><div>Item: Harvest Snaps Salt&Vinegar</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 87</div>
                    <div>Ingredients: Green Peas (64%), Vegetable Oil [with Antioxidant], Rice, Seasoning [salt, vinegar Powder, Sugar, Flavour Enhancers (621, 627, 631), Maltodextrin, Food Acids (262, 330), Mineral Salt (341), Vegetable Oil], Stabiliser </div>
                    <div><img src="harvest_s&v.JPG" alt="Picture of Harvest Snaps Salt&Vinegar" width="100" height="100"></div>
                </td>
                <td><div>Item: Long Black</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 4</div>
                    <div>Ingredients: ratio of 3/4 water and 1/4 espresso, or 4/5 water 1/5th espresso</div>
                    <div><img src="long_black.JPG" alt="Picture of Iced long black can" width="100" height="100"></div>
                </td>
                <td><div>Item: Ritz Original Crackers</div>
                    <div>Price: $2.50</div>
                    <div>Stock: Y</div>
                    <div>Calories: 80</div>
                    <div>Ingredients: Wheat Flour, Vegetable Oil (Antioxidant (304)), Sugar, Fructose Syrup, Salt, Raising Agents (500, 341, 503), Emulsifier (Soy Lecithin)</div>
                    <div><img src="ritz_crackers.JPG" alt="Picture of Ritz cracker" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Caramel Slice</div>
                    <div>Price: Y</div>
                    <div>Stock: $4.00</div>
                    <div>Calories: 382</div>
                    <div>Ingredients: Sugar, wheat flour, milk solids, butter (cream, water, salt), pecans (5%), margarine (soy), water, golden syrup, cocoa, coconut, glucose, salt, raising agents (450, 500), preservative 202</div>
                    <div><img src="caramel_slice.JPG" alt="Picture of Caramel Slice" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Proper Crisps</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 511/div>
                    <div>Ingredients: Potatoes, High Oleic Sunflower Oil, Sea Salt</div>
                    <div><img src="proper_ss.JPG" alt="Picture of Proper crisps bag" width="100" height="100"></div>
                </td>
                <td><div>Item: Harvest Snaps Salt</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 120</div>
                    <div>Ingredients: Green Peas, Vegetable Oil, Rice, Original Salt Seasoning (Sugar, Salt, Maltodextrin, Yeast Extract, Vegetable Oil, Flavour Enhancer, Anti Caking Agent, Food Acid, Stabiliser</div>
                    <div><img src="harvest_OG.JPG" alt="Picture of Harvest Snaps Salt" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Flat White</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 120</div>
                    <div>Ingredients: ground espresso, milk</div>
                    <div><img src="flat_white.JPG" alt="Picture of Flat white" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: 2 Minute Noodles</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 299</div>
                    <div>Ingredients: Noodle Cake: Wheat Flour, Wholemeal Flour(Contains Wheat), Tapioca Starch, Water, Mineral Salts, Vegetable Oil, Salt, Stabilisers, Vegetable Gum</div>
                    <div><img src="noodles.JPG" alt="Picture of 2 Minute Noodles" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Fudge</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 411</div>
                    <div>Ingredients: Sugar, Milk, butter</div>
                    <div><img src="fudge.JPG" alt="Picture of Fudge" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Fruit Nuggets</div>
                    <div>Price: $0.50</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients: Fruit Juices & Purees, Sugar, Corn Syrup, Tapioca Starch, Acidity Regulators, Apple or Citrus Fibre, Natural Flavourings, Gelling Agent, Antioxidant, Natural Colours</div>
                    <div><img src="fruit_nuggets.JPG" alt="Picture of Fruit Nuggets" width="100" height="100"></div>
                </td>
                <td><div>Item: Harvest Snaps Chilli</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 100</div>
                    <div>Ingredients: Green Peas, Vegetable oil [with antioxidant (307b)], Rice, Seasoning, Mineral Salt</div>
                    <div><img src="harvest_snaps_chilli.JPG" alt="Picture of Harvest Snaps Chilli" width="100" height="100"></div>
                </td>
                <td><div>Item: L&P</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 196</div>
                    <div>Ingredients: Carbonated Water Sugar, Food Acid, Flavour, Mineral Salts, Colour</div>
                    <div><img src="l&p.JPG" alt="Picture of L&P Drink" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Sandwich(Veg)</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 139</div>
                    <div>Ingredients: white bread or brown, capsicum, mayo, onion, tomato, cucumber, carrot, cabbage</div>
                    <div><img src="veg_sandwich.JPG" alt="Picture of Veg Sandwich" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Lemon Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                    <div><img src="glutenfree_lem.JPG" alt="Picture of Lemon Slice" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Potato Stix Original</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 536</div>
                    <div>Ingredients: Potato starch, rice, wheat flour, vegetable oil, potato seasoning, maltodextrin, salt, vegetable powder, yeast extracts, mineral salt, natural flavour, spices, sugar, anti-caking agent, acidity regulator</div>
                    <div><img src="potato_stix.JPG" alt="Picture of Potato Stix Original" width="100" height="100"></div>
                </td>
                <td><div>Item: Serious Popcorn</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 99</div>
                    <div>Ingredients: Popcorn, coconut oil, sea salt</div>
                    <div><img src="serious_popcorn.JPG" alt="Picture of Serious Popcorn Packet" width="100" height="100"></div>
                </td>
                <td><div>Item: Orange Juice</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 45</div>
                    <div>Ingredients: On Average 9-10 Squeezed Oranges</div>
                    <div><img src="orange_juice.JPG" alt="Picture of Orange Juice" width="100" height="100"></div>
                </td>
                <td><div>Item: Serious Popcorn</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 99</div>
                    <div>Ingredients: Popcorn, coconut oil, sea salt</div>
                    <div><img src="serious_popcorn.JPG" alt="Picture of Serious Popcorn Packet" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Oreo Cookies</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 140</div>
                    <div>Ingredients: Sugar, Unbleached enriched flour, High oleic canola oil or palm oil, Cocoa, High-fructose corn syrup, Leavening agent, Corn starch, Salt, Soy lecithin, Vanillin, Chocolate</div>
                    <div><img src="oreos.JPG" alt="Picture of Oreo Cookies" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Copper Kettle Sea Salt</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 500</div>
                    <div>Ingredients: potatoes, sunflower oil, salt. Allergen Information: Made on a production line that also produces products containing milk, soy and gluten.</div>
                    <div><img src="kettle_ss.JPG" alt="Picture of Copper Kettle Sea Salt" width="100" height="100"></div>
                </td>
                <td><div>Item: Keto Berry Cream Wafer</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients: Milk, Soy and Cereals Containing Gluten (Wheat).
                        May Contain: Cereals Containing Gluten (Oats), Peanuts, Tree Nuts (Hazelnuts, Almonds) and Sesame Seeds</div>
                    <div><img src="keto_berry.JPG" alt="Picture of Keto Berry Cream Wafer" width="100" height="100"></div>
                </td>
                <td><div>Item: Sprite</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 39 per 100g</div>
                    <div>Ingredients: Carbonated Water, Sugar, Citric Acid, Sweeteners, Acidity Regulator, Natural Lemon and Lime Flavourings</div>
                    <div><img src="sprite.JPG" alt="Picture of Sprite Drink" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Fries</div>
                    <div>Price: $7.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 312</div>
                    <div>Ingredients: Potato, Oil, Water, Salt, Pepper</div>
                    <div><img src="fries.JPG" alt="Picture of Potato Fries" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Chocolate Cupcake</div>
                    <div>Price: $6.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 241</div>
                    <div>Ingredients: 1 cup (130g) all purpose flour, sugar, unsweetened cocoa powder, salt, egg, buttermilk, vegetable oil, vanilla.</div>
                    <div><img src="choc_cupcake.JPG" alt="Picture of Chocolate Cupcake" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: The Natural Fruit Jellies</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 347</div>
                    <div>Ingredients: Cane Sugar, Glucose Syrup, Water, Gelatine, Food Acids, Natural Flavours, Natural Food Colours, Fruit Juice Concentrates.</div>
                    <div><img src="the_natural_gummies.JPG" alt="Picture of The Natural Fruit Jellies" width="100" height="100"></div>
                </td>
                <td><div>Item: Keto Choc Hazelnut Wafer</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 187 </div>
                    <div>Ingredients: Protein Milk Chocolate, Whey Protein Concentrate, Wheat Flour, Sweetener, Prebiotic Fibre, Cocoa Powder, Wheat Starch, Emulsifier, Natural Flavours, Salt, Natural Colour, Raising Agent, Vitamin B5.</div>
                    <div><img src="keto_choc.JPG" alt="Picture of Keto Choc Hazelnut Wafer" width="100" height="100"></div>
                </td>
                <td><div>Item: Water</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 0</div>
                    <div>Ingredients: water.</div>
                    <div><img src="water.JPG" alt="Picture of Water bottle" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Organic Seaweed Snack</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 45</div>
                    <div>Ingredients: Organic Seaweed, Organic Sunflower Oil, Organic Sesame Oil, Sea Salt, Organic Rosemary Extract</div>
                    <div><img src="seaweed.JPG" alt="Picture of Organic Seaweed Snack packet" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Magnum Almond Ice Cream</div>
                    <div>Price: $7.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 272</div>
                    <div>Ingredients: Dairy ingredients, cane sugar, cocoa components, almond, vegetable oil, glucose, emulsifiers, stabilisers, flavours, colour</div>
                    <div><img src="magnum.JPG" alt="Picture of Mangum Almond Ice Cream" width="100" height="100"></div>
                </td>

            </tr>
        </table>
    </center>
    </p>
    
</main>