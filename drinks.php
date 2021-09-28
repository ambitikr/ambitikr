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
    <title> COFFEE SHOP</title>
    <meta charset="utf-8"
    <link rel="stylesheet" href = "css/custom-style.css"/>
    <link href="style.css" rel="stylesheet" type="text/css">
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
<h2>Search a Drink</h2>

    <form action="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>

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
                echo $row ['DrinkName'];
                echo ": $";
                echo $row ['Cost'];
                echo " ---- Availability:";
                echo $row ['Available'];
                echo"<br>";
            }
        }
    }
    ?>

    <h3>Other Drinks</h3>
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

    <h2>Drink Information</h2>

    <?php
    echo "<p> Drink Name: " . $this_drink_record['DrinkName'] . "<br>";
    echo "<p> Availability: " . $this_drink_record['Available'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>
    
</main>