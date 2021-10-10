<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

if(isset($_GET['sweet'])){
    $id = $_GET['sweet'];
}else{
    $id = 1;
}

/* Sweets Query*/
$this_sweet_query = "SELECT SweetName, Stock, Cost  FROM sweets WHERE SweetID  = '"   .  $id  . "'";
$this_sweet_result = mysqli_query($con, $this_sweet_query);
$this_sweet_record = mysqli_fetch_assoc($this_sweet_result);

/* Sweet Items Query from menu*/
$all_sweet_query = "SELECT SweetID, SweetName FROM sweets";
$all_sweet_result = mysqli_query($con, $all_sweet_query);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title> SWEETS</title>
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
                    <a class="active" href="sweet.php">SWEET ITEMS MENU</a>
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
        <a href="drinks.php">Drinks Menu</a>
        <a href="savoury.php">Savory Menu</a>
        <a class="active" href="sweet.php">Sweet Menu</a>
    </div>
    <br>
        <h2>Search a Sweet Item</h2>

        <form action="" method="post">
            <input type="text" name='search' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
            <input type="submit" name="submit" value="Search" style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
        </form>
    <center>
        <?php
        if(isset($_POST['search'])) {
            $search = $_POST['search'];

            $query1 = "SELECT SweetName, Cost, Stock FROM sweets WHERE SweetName LIKE '%$search%'";
            $query = mysqli_query($con, $query1);
            $count = mysqli_num_rows($query);

            if($count == 0){
                echo "There was no search results!";
            }else{
                while($row = mysqli_fetch_array($query)) {
                    echo "<p> Sweet Name: " . $row['SweetName'] . "<br>";
                    /*echo $row ['SweetName'];*/
                    echo "<p> Cost: $" . $row['Cost'] . "<br>";
                    /*echo ": $";
                    echo $row ['Cost'];*/
                    echo "<p> Availability: " . $row['Stock'] . "<br>";
                    /*echo " ---- Availability:";
                    echo $row ['Stock'];*/
                    echo"<br>";
                }
            }
        }
        ?>
    </center>
    <h2>Other Sweet Items</h2>

    <form name='sweet_form' id='sweet_form' method = 'get' action = 'sweet.php'>
        <select id = 'sweet' name = 'sweet' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
            <?php
            while($all_sweet_record = mysqli_fetch_assoc($all_sweet_result)){
                echo "<option value = '". $all_sweet_record['SweetID'] . "'>";
                echo $all_sweet_record['SweetName'];
                echo "</option>";
            }
            ?>

            <input type='submit' name='savory_button' value='Show me the order information' style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
    </form>
    <h2>Sweet Item Information</h2>
    <?php
    echo "<p> Item Name: " . $this_sweet_record['SweetName'] . "<br>";
    echo "<p> Availability: " . $this_sweet_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_sweet_record['Cost'] . "<br>";
    ?>

<h2>Sort Items</h2>
    <main>
        <form name="manage" action="sweet.php" method="post" align="center">
            <select name="manage" style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; ">
                <option value="choose">Sort by</option>
                <option value="CostDESC">Price high to low</option>
                <option value="CostASC">price low to high</option>
                <option value="SweetNameDESC">Savory Item A-Z</option>
                <option value="StockASC">Available to not available</option>
            </select>
            <input style = "background-color:#bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; " type="submit" value=" - Sort - " />
        </form>
    </main>
    <?php
    if (isset($_POST['manage'])){
        switch( $_POST['manage'] ){
            case 'choose':
                $query = 'SELECT SweetID, SweetName, Cost, Stock FROM sweets ORDER BY Cost DESC';
                break;
            case 'CostDESC':
                $query = 'SELECT SweetID, SweetName, Cost, Stock FROM sweets ORDER BY Cost DESC';
                break;
            case 'CostASC':
                $query = ' SELECT SweetID, SweetName, Cost, Stock FROM sweets ORDER BY cost ASC';
                break;
            case 'SweetNameDESC':
                $query = ' SELECT SweetID, SweetName, Cost, Stock  FROM sweets ORDER BY SweetName ASC';
                break;
            case 'StockASC':
                $query = ' SELECT SweetID, SweetName, Cost, Stock FROM sweets ORDER BY Stock DESC';
                break;
        }
    }else{
        $query = "SELECT * FROM sweets";
    }
    $results = mysqli_query( $con, $query );
    ?>
    </div>


    <center>
        <table border="2" class="center">
            <tr>
                <td>Sweet Item Name</td>
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
                    <td><?php echo $data['SweetName']; ?></td>
                    <td><?php echo $data['Cost']; ?></td>
                    <td><?php echo $data['Stock']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>


        <h2>Here is our Sweet Items Menu</h2>

        <table border="2">
            <tr>
                <th style="width:200">Drink Name</th>
                <th style="width:200">Image of Item</th>
                <th style="width:200">Price</th>
                <th style="width:150">Availability</th>
            </tr>
            <tr>
                <td>
                    <div><u>Blueberry Cupcakes:</u></div><br>
                    <div>Ingredients: Blueberries, flour, sugar, oil, milk, egg, baking powder, Salt and vanilla extract</div><br>
                    <div><strong>Calories:</strong> 297</div>
                </td>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Blueberry_muffin%2C_wrapped.jpg" alt="Picture of Blueberry Cupcakes"  width="150" height="150" class="center"></td><br>
                <td>$6.00</td>
                <td>N</td>
            </tr>
            <tr>
                <td>
                    <div><u>Caramel Slices:</u></div><br>
                    <div>Ingredients: Sugar, wheat flour, milk solids, butter (cream, water, salt), pecans (5%), margarine (soy), water, golden syrup, cocoa, coconut, glucose, salt, raising agents (450, 500), preservative 202</div><br>
                    <div><strong>Calories:</strong> 382</div>
                </td>
                <td><img src="https://live.staticflickr.com/4033/4390905480_14d4a50528_b.jpg" alt="Picture of Caramel Slices"  width="160" height="120" class="center"</td>
                <td>$4.00</td>
                <td>Y</td>
            </tr>
            <tr>
                <td>
                    <div><u>Fudge:</u></div><br>
                    <div>Ingredients: Sugar, Milk, butter</div><br>
                    <div><strong>Calories:</strong> 411</div>
                </td>
                <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyer-c-K1FcYpz0tOReAwNJFalBVfPXyXFTQ&usqp=CAU" alt="Picture of Fudge" width="135" height="120" class="center"></td>
                <td>$5.00</td>
                <td>Y</td>
            </tr>
            <tr>
                <td>
                    <div><u>Magnum Almond 5 pack: </u></div><br>
                    <div>Ingredients:  Dairy ingredients, cane sugar, cocoa components, almond, vegetable oil, glucose, emulsifiers, stabilisers, flavours, colour</div><br>
                    <div><strong>Calories:</strong> 272</div>
                </td>
                <td><img src="https://world.openfoodfacts.org/images/products/885/193/229/5789/front_en.30.full.jpg" alt="Picture of Magnum Almond 5 pack ice cream"  width="180" height="100" class="center"></td>
                <td>$7.00</td>
                <td>Y</td>
            </tr>
            <tr>
                <td>
                    <div><u>Lamington:</u></div><br>
                    <div>Ingredients: self-raising flour, plain flour, wheaten cornflour, eggs, at room temperature, Chelsea Raw Caster Sugar, boiling water, butter, shredded coconut (for rolling pieces in)</div><br>
                    <div><strong>Calories:</strong> 187</div>
                </td>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Mocha_Flake_amingtons.jpg/375px-Mocha_Flake_amingtons.jpg" alt="Picture of Lamingtons" width="130" height="130" class="center"></td>
                <td>$3.00</td>
                <td>N</td>
            </tr>
            <tr>
                <td>
                    <div><u>Oreo Cookies:</u></div><br>
                    <div>Ingredients: Wheat Flour, Sugar, Vegetable Oil (contains Antioxidant (319)), Cocoa Powder, Fructose Syrup, Cornstarch, Raising Agents (500, 503), Salt, Emulsifier (Soy Lecithin), Flavour.</div><br>
                    <div><strong>Calories:</strong> 160</div>
                </td>
                <td><img src="https://www.godairyfree.org/wp-content/uploads/2020/11/news-gluten-free-oreos.jpg" alt="Picture of Oreo cookies" width="120" height="130" class="center"></td>
                <td>$5.00</td>
                <td>Y</td>
            </tr>
            <tr>
                <td>
                    <div><u>Raspberry Slice:</u></div><br>
                    <div>Ingredients: ground almonds, desiccated coconut, gluten free plain flour, Chelsea Caster Sugar, (125g) unsalted butter, melted, egg yolks, cold water, cup raspberry jam, frozen raspberries, Chelsea Icing Sugar</div><br>
                    <div><strong>Calories:</strong> 430</div>
                </td>
                <td><img src="https://p1.pxfuel.com/preview/410/318/538/food-drink-food-fruit.jpg" alt="Picture of Raspberry Slice" width="150" height="130" class="center"></td>
                <td>$3.00</td>
                <td>Y</td>
            </tr>
            <tr>
                <td>
                    <div><u>Snickers:</u></div><br>
                    <div>Ingredients: white sugar, sweet milk chocolate, corn syrup, peanuts, milk condensed with sugar, coconut oil, malted milk, whites of eggs and salt</div><br>
                    <div><strong>Calories:</strong> 57grams</div>
                </td>
                <td><img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3c/Snickers_wrapped.png/360px-Snickers_wrapped.png" alt="Picture of Snickers bar" width="180" height="80" class="center"></td>
                <td>$2.00</td>
                <td>Y</td>
            </tr>
        </table>

    </center>


    <?php mysqli_close($con); // Close connection ?>

</main>
