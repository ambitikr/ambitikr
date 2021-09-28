<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database ";
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
<body style="background-color:#C3CED2;">
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
        <input type='submit' name='savory_button' value='Show me the Savory Item information'>
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

            <input type='submit' name='savory_button' value='Show me the Sweet Item information'>
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
                    <div>Item: Vegan Pasta</div>
                    <div>Price: $4.00</div>
                    <div>Stock:</div>
                    <div>Calories: 580</div>
                    <div>Ingredients: grade pasta flour, semolina four, olive oil, water, salt</div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtzuwGvzTZKUTz1fvo7BJjOyuX3FcaCdLtzQ&usqp=CAU" alt="Vegan Pasta" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Oreo Chocolate Sandwich Cookies</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div><img src="https://www.godairyfree.org/wp-content/uploads/2020/11/news-gluten-free-oreos.jpg" alt="Oreo Chocolate Sandwich Cookies" width="100" height="100"></div>
                </td>

                <td>
                    <div>Item: Chocolate Milk</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 139</div>
                    <div>Ingredients: Milk, Whittaker's Creamy Milk Chocolate, (Sugar, Milk Powder, Cocoa Solids, Vanilla Flavour), Cocoa Powder</div>
                    <div><img src="https://live.staticflickr.com/4686/38262256334_98b90c7e68_b.jpg" alt="Chocolate Milk" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Sea Salt chips</div>
                    <div>Price: $2.00</div>
                    <div>Stock:Y</div>
                    <div>Calories: 160</div>
                    <div>Ingredients: Potatoes, sunflower oil, sea salt</div>
                    <div><img src="https://au.openfoodfacts.org/images/products/08275727/front_en.8.full.jpg" alt="Picture of Sea salt chips" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Snickers</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 57grams</div>
                    <div>Ingredients: white sugar, sweet milk chocolate, corn syrup, peanuts, milk condensed with sugar, coconut oil, malted milk, whites of eggs and salt</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3c/Snickers_wrapped.png/360px-Snickers_wrapped.png" alt="Picture of Snickers bar" width="100" height="100"></div>
                </td>
            </tr>
            <tr>
                <td><div>Item: Pringles Original Potato Crisps</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 150</div>
                    <div>Ingredients: Dehydrated Potato, Vegetable Oils, Wheat Starch, Rice Flour, Emulsifier, Maltodextrin, Salt, Food Acid </div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw5V0WyBm89VB3IqH6PhgzCRRyyjtwJ1Xy8g&usqp=CAU" alt="Picture of Pringles" width="100" height="100"></div>
                </td>

                <td><div>Item: Gluten Free Raspberry Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 430</div>
                    <div>Ingredients: ground almonds, desiccated coconut, gluten free plain flour, Chelsea Caster Sugar, (125g) unsalted butter, melted, egg yolks, cold water, cup raspberry jam, frozen raspberries, Chelsea Icing Sugar</div>
                    <div><img src="https://p1.pxfuel.com/preview/410/318/538/food-drink-food-fruit.jpg" alt="Picture of Gluten Free Raspberry Slice" width="100" height="100"></div>
                </td>
                <td><div>Item: Coke</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 140</div>
                    <div>Ingredients: coca leaves, and kola nuts (a source of caffeine)</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/15-09-26-RalfR-WLC-0098.jpg/255px-15-09-26-RalfR-WLC-0098.jpg" alt="Picture" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Heartland Salt & Vinegar chips</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 40g per serving</div>
                    <div>Ingredients: Potatoes, High Oleic Sunflower Oil, Canola Oil , Acidity Regulators (262, 330), Salt, Sugar, Flavour Enhancer (621), Dextrose (Maize), Maize Starch, Natural Flavour</div>
                    <div><img src="https://kiwicornerdairy.com/pub/media/catalog/product/cache/02de9f15904050a853201665f0046d23/h/e/heartland-potato-chips-salt-vinegar_1.jpg" alt="Picture of Heartland Salt and vinegar chips" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Lamingtons</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 187</div>
                    <div>Ingredients: self-raising flour, plain flour, wheaten cornflour, eggs, at room temperature, Chelsea Raw Caster Sugar, boiling water, butter, shredded coconut (for rolling pieces in)</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Mocha_Flake_amingtons.jpg/375px-Mocha_Flake_amingtons.jpg" alt="Picture of Lamingtons" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Ritz Original Crackers</div>
                    <div>Price: $2.50</div>
                    <div>Stock: Y</div>
                    <div>Calories: 80</div>
                    <div>Ingredients: Wheat Flour, Vegetable Oil (Antioxidant (304)), Sugar, Fructose Syrup, Salt, Raising Agents (500, 341, 503), Emulsifier (Soy Lecithin)</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/2020-07-19_12_17_29_A_sample_of_Nabisco_Mini_Ritz_crackers_in_the_Dulles_section_of_Sterling%2C_Loudoun_County%2C_Virginia.jpg/300px-2020-07-19_12_17_29_A_sample_of_Nabisco_Mini_Ritz_crackers_in_the_Dulles_section_of_Sterling%2C_Loudoun_County%2C_Virginia.jpg" alt="Picture of Ritz cracker" width="100" height="100"></div>
                </td>
                <td><div>Item: Gluten Free Lemon Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 174</div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3ae2EJEB6Zz_STpjxc-MDLlLk9MmXiIW4cB4AKVsCNnxAvdaBbQ8yhG2qH076ntM7JFM&usqp=CAU" alt="Picture of Gluten Free Lemon Slice" width="100" height="100"></div>
                </td>
                <td><div>Item: Fanta</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 63</div>
                    <div>Ingredients: Carbonated Water, Sugar, Orange Juice from Concentrate, Citrus Fruit from Concentrate, Citric Acid, Vegetable Extracts, Sweeteners, Preservative, Malic Acid, Acidity Regulator, Stabiliser, Natural Orange</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Fanta_raspberry_330ml_can-front_PNr%C2%B00853.jpg/330px-Fanta_raspberry_330ml_can-front_PNr%C2%B00853.jpg" alt="Picture of Can of Fanta" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Heartland Salt chips </div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 215</div>
                    <div>Ingredients: Potatoes, High Oleic Sunflower Oil, Canola Oil , Salt</div>
                    <div><img src="https://static.openfoodfacts.org/images/products/942/190/221/3236/front_en.3.full.jpg" alt="Picture of Heartland Salt chips" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Raspberry Slice</div>
                    <div>Price: Y</div>
                    <div>Stock: $4.00</div>
                    <div>Calories: 53 in 100 grams</div>
                    <div>Ingredients: Sugar, Wheat Flour, Raspberries, Butter, Margarine, Water, Milk Solids, Humectant, Raising Agents, Salt, Flavour, Emulsifier, Thickener, Stabilisers, Food Acids, Preservative, Natural Colour</div>
                    <div><img src="https://live.staticflickr.com/7858/47287618081_da13c082e5_b.jpg" alt="Picture of Raspberry Slice" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Doritos Spicy Sweet Chilli</div>
                    <div>Price: $4.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 140</div>
                    <div>Ingredients: Corn, Vegetable Oil (Corn, Canola, and/or Sunflower Oil), Salt, Sugar, Monosodium Glutamate, Fructose, Sodium Diacetate, Soy Sauce, Onion Powder, Maltodextrin, Hydrolyzed Soy Protein, Hydrolyzed Corn Protein, Garlic Powder, Torula Yeast, Malic Acid, Extractives of Paprika, Spice</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/002/840/042/1195/front_en.21.full.jpg" alt="Picture of Bag of Doritos" width="100" height="100"></div>
                </td>
                <td><div>Item: Harvest Snaps Salt&Vinegar</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 87</div>
                    <div>Ingredients: Green Peas (64%), Vegetable Oil [with Antioxidant], Rice, Seasoning [salt, vinegar Powder, Sugar, Flavour Enhancers (621, 627, 631), Maltodextrin, Food Acids (262, 330), Mineral Salt (341), Vegetable Oil], Stabiliser </div>
                    <div><img src="https://world.openfoodfacts.org/images/products/935/158/500/0109/front_en.3.full.jpg" alt="Picture of Harvest Snaps Salt&Vinegar" width="100" height="100"></div>
                </td>
                <td><div>Item: Long Black</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 4</div>
                    <div>Ingredients: ratio of 3/4 water and 1/4 espresso, or 4/5 water 1/5th espresso</div>
                    <div><img src="https://cdn0.woolworths.media/content/wowproductimages/large/066122.jpg" alt="Picture of Iced long black can" width="100" height="100"></div>
                </td>
                <td><div>Item: Ritz Original Crackers</div>
                    <div>Price: $2.50</div>
                    <div>Stock: Y</div>
                    <div>Calories: 80</div>
                    <div>Ingredients: Wheat Flour, Vegetable Oil (Antioxidant (304)), Sugar, Fructose Syrup, Salt, Raising Agents (500, 341, 503), Emulsifier (Soy Lecithin)</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/2020-07-19_12_17_29_A_sample_of_Nabisco_Mini_Ritz_crackers_in_the_Dulles_section_of_Sterling%2C_Loudoun_County%2C_Virginia.jpg/300px-2020-07-19_12_17_29_A_sample_of_Nabisco_Mini_Ritz_crackers_in_the_Dulles_section_of_Sterling%2C_Loudoun_County%2C_Virginia.jpg" alt="Picture of Ritz cracker" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Caramel Slice</div>
                    <div>Price: Y</div>
                    <div>Stock: $4.00</div>
                    <div>Calories: 382</div>
                    <div>Ingredients: Sugar, wheat flour, milk solids, butter (cream, water, salt), pecans (5%), margarine (soy), water, golden syrup, cocoa, coconut, glucose, salt, raising agents (450, 500), preservative 202</div>
                    <div><img src="https://live.staticflickr.com/4033/4390905480_14d4a50528_b.jpg" alt="Picture of Caramel Slice" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Proper Crisps</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 511/div>
                    <div>Ingredients: Potatoes, High Oleic Sunflower Oil, Sea Salt</div>
                    <div><img src="http://cdn.shopify.com/s/files/1/0045/2712/8647/products/ec8596e03eba96cada0a9fba263f4205edfea177_1200x1200.jpg?v=1586318039" alt="Picture of Proper crisps bag" width="100" height="100"></div>
                </td>
                <td><div>Item: Harvest Snaps Salt</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 120</div>
                    <div>Ingredients: Green Peas, Vegetable Oil, Rice, Original Salt Seasoning (Sugar, Salt, Maltodextrin, Yeast Extract, Vegetable Oil, Flavour Enhancer, Anti Caking Agent, Food Acid, Stabiliser</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/935/158/500/0192/front_en.9.full.jpg" alt="Picture of Harvest Snaps Salt" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Flat White</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 120</div>
                    <div>Ingredients: ground espresso, milk</div>
                    <div><img src="https://live.staticflickr.com/2943/15344423582_f5ba6b14df_b.jpg" alt="Picture of Flat white" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: 2 Minute Noodles</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 299</div>
                    <div>Ingredients: Noodle Cake: Wheat Flour, Wholemeal Flour(Contains Wheat), Tapioca Starch, Water, Mineral Salts, Vegetable Oil, Salt, Stabilisers, Vegetable Gum</div>
                    <div><img src="https://p2.piqsels.com/preview/263/414/444/food-ramen-noodles-cooking-thumbnail.jpg" alt="Picture of 2 Minute Noodles" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Fudge</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 411</div>
                    <div>Ingredients: Sugar, Milk, butter</div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyer-c-K1FcYpz0tOReAwNJFalBVfPXyXFTQ&usqp=CAU" alt="Picture of Fudge" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Fruit Nuggets</div>
                    <div>Price: $0.50</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients: Fruit Juices & Purees, Sugar, Corn Syrup, Tapioca Starch, Acidity Regulators, Apple or Citrus Fibre, Natural Flavourings, Gelling Agent, Antioxidant, Natural Colours</div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIq6YZ3PZLJzF5k5xHovhWGskuSkNzgZehug&usqp=CAU" alt="Picture of Fruit Nuggets" width="100" height="100"></div>
                </td>
                <td><div>Item: Harvest Snaps Chilli</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 100</div>
                    <div>Ingredients: Green Peas, Vegetable oil [with antioxidant (307b)], Rice, Seasoning, Mineral Salt</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/935/158/500/0017/front_en.8.full.jpg" alt="Picture of Harvest Snaps Chilli" width="100" height="100"></div>
                </td>
                <td><div>Item: L&P</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 196</div>
                    <div>Ingredients: Carbonated Water Sugar, Food Acid, Flavour, Mineral Salts, Colour</div>
                    <div><img src="https://live.staticflickr.com/4586/27200301779_827e93106b_b.jpg" alt="Picture of L&P Drink" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Sandwich(Veg)</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 139</div>
                    <div>Ingredients: white bread or brown, capsicum, mayo, onion, tomato, cucumber, carrot, cabbage</div>
                    <div><img src="https://p1.pxfuel.com/preview/311/545/138/salad-sandwiches-lunch-bread.jpg" alt="Picture of Veg Sandwich" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Lemon Slice</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients:</div>
                    <div><img src="https://live.staticflickr.com/8333/8115395137_4cf038231b_b.jpg" alt="Picture of Lemon Slice" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Potato Stix Original</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 536</div>
                    <div>Ingredients: Potato starch, rice, wheat flour, vegetable oil, potato seasoning, maltodextrin, salt, vegetable powder, yeast extracts, mineral salt, natural flavour, spices, sugar, anti-caking agent, acidity regulator</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/940/009/703/8046/front_en.3.full.jpg" alt="Picture of Potato Stix Original" width="100" height="100"></div>
                </td>
                <td><div>Item: Serious Popcorn</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 99</div>
                    <div>Ingredients: Popcorn, coconut oil, sea salt</div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbwqFEcjlzdCl5mcTB1A2KECleaFLisImbEw&usqp=CAU" alt="Picture of Serious Popcorn Packet" width="100" height="100"></div>
                </td>
                <td><div>Item: Orange Juice</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 45</div>
                    <div>Ingredients: On Average 9-10 Squeezed Oranges</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/942/190/308/4019/front_fr.4.full.jpg" alt="Picture of Orange Juice" width="100" height="100"></div>
                </td>
                <td><div>Item: Serious Popcorn</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 99</div>
                    <div>Ingredients: Popcorn, coconut oil, sea salt</div>
                    <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbwqFEcjlzdCl5mcTB1A2KECleaFLisImbEw&usqp=CAU" alt="Picture of Serious Popcorn Packet" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Oreo Cookies</div>
                    <div>Price: $5.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 140</div>
                    <div>Ingredients: Sugar, Unbleached enriched flour, High oleic canola oil or palm oil, Cocoa, High-fructose corn syrup, Leavening agent, Corn starch, Salt, Soy lecithin, Vanillin, Chocolate</div>
                    <div><img src="https://us.openfoodfacts.org/images/products/004/400/002/0170/front_en.14.full.jpg" alt="Picture of Oreo Cookies" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: Copper Kettle Sea Salt</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 500</div>
                    <div>Ingredients: potatoes, sunflower oil, salt. Allergen Information: Made on a production line that also produces products containing milk, soy and gluten.</div>
                    <div><img src="https://live.staticflickr.com/1534/24237534202_87804d0be0_b.jpg" alt="Picture of Copper Kettle Sea Salt" width="100" height="100"></div>
                </td>
                <td><div>Item: Keto Berry Cream Wafer</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories:</div>
                    <div>Ingredients: Milk, Soy and Cereals Containing Gluten (Wheat).
                        May Contain: Cereals Containing Gluten (Oats), Peanuts, Tree Nuts (Hazelnuts, Almonds) and Sesame Seeds</div>
                    <div><img src="https://world-es.openfoodfacts.org/images/products/931/729/634/2518/front_en.4.full.jpg" alt="Picture of Keto Berry Cream Wafer" width="100" height="100"></div>
                </td>
                <td><div>Item: Sprite</div>
                    <div>Price: $3.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 39 per 100g</div>
                    <div>Ingredients: Carbonated Water, Sugar, Citric Acid, Sweeteners, Acidity Regulator, Natural Lemon and Lime Flavourings</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/544/900/000/0729/front_fr.9.full.jpg" alt="Picture of Sprite Drink" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Fries</div>
                    <div>Price: $7.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 312</div>
                    <div>Ingredients: Potato, Oil, Water, Salt, Pepper</div>
                    <div><img src="https://p1.pxfuel.com/preview/775/337/149/potato-frying-yellow-unhealthy-obesity-diet.jpg" alt="Picture of Potato Fries" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Chocolate Cupcake</div>
                    <div>Price: $6.00</div>
                    <div>Stock: N</div>
                    <div>Calories: 241</div>
                    <div>Ingredients: 1 cup (130g) all purpose flour, sugar, unsweetened cocoa powder, salt, egg, buttermilk, vegetable oil, vanilla.</div>
                    <div><img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Chocolate_Cupcakes_with_Raspberry_Buttercream_detail.jpg" alt="Picture of Chocolate Cupcake" width="100" height="100"></div>
                </td>

            </tr>
            <tr>
                <td><div>Item: The Natural Fruit Jellies</div>
                    <div>Price: $4.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 347</div>
                    <div>Ingredients: Cane Sugar, Glucose Syrup, Water, Gelatine, Food Acids, Natural Flavours, Natural Food Colours, Fruit Juice Concentrates.</div>
                    <div><img src="https://res.cloudinary.com/abillionveg/image/upload/q_auto,a_exif,w_1080,h_1080,c_fill/v1620281609/clhs8is573qzxly5dbqm.jpg" alt="Picture of The Natural Fruit Jellies" width="100" height="100"></div>
                </td>
                <td><div>Item: Keto Choc Hazelnut Wafer</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 187 </div>
                    <div>Ingredients: Protein Milk Chocolate, Whey Protein Concentrate, Wheat Flour, Sweetener, Prebiotic Fibre, Cocoa Powder, Wheat Starch, Emulsifier, Natural Flavours, Salt, Natural Colour, Raising Agent, Vitamin B5.</div>
                    <div><img src="http://cdn.shopify.com/s/files/1/0248/1645/1638/products/received_2716163765332109_grande.jpg?v=1592963647" alt="Picture of Keto Choc Hazelnut Wafer" width="100" height="100"></div>
                </td>
                <td><div>Item: Water</div>
                    <div>Price: $2.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: </div>
                    <div>Ingredients: water.</div>
                    <div><img src="https://ak.picdn.net/shutterstock/videos/20516482/thumb/1.jpg" alt="Picture of Water bottle" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Organic Seaweed Snack</div>
                    <div>Price: $3.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 45</div>
                    <div>Ingredients: Organic Seaweed, Organic Sunflower Oil, Organic Sesame Oil, Sea Salt, Organic Rosemary Extract</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/629/110/777/3636/front_fr.4.full.jpg" alt="Picture of Organic Seaweed Snack packet" width="100" height="100"></div>
                </td>
                <td>
                    <div>Item: Magnum Almond Ice Cream</div>
                    <div>Price: $7.00</div>
                    <div>Stock: Y</div>
                    <div>Calories: 272</div>
                    <div>Ingredients: Dairy ingredients, cane sugar, cocoa components, almond, vegetable oil, glucose, emulsifiers, stabilisers, flavours, colour</div>
                    <div><img src="https://world.openfoodfacts.org/images/products/885/193/229/5789/front_en.30.full.jpg" alt="Picture of Mangum Almond Ice Cream" width="100" height="100"></div>
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