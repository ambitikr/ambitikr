<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_wgc_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

/* Sweets Query*/
$this_sweet_query = "SELECT SweetName, Stock, Cost  FROM sweets WHERE SweetID  = '"   .$_GET['sweet']  . "'";
$this_sweet_result = mysqli_query($con, $this_sweet_query);
$this_sweet_record = mysqli_fetch_assoc($this_sweet_result);

/* Sweet Items Query from menu*/
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
            <li> <a href='menu.php'> MENU</a></li>
            <li> <a href='drinks.php'> DRINKS MENU</a></li>
            <li> <a href='savoury.php'> SAVOURY ITEMS</a></li>
            <li> <a href='sweet.php'> SWEET ITEMS</a></li>
            <li> <a href='contacts.php'>INFORMATION</a></li>
        </ul>
    </nav>
</header>
</body>
<main>
    <h2>Sweet Item Information</h2>

    <?php
    echo "<p> Item Name: " . $this_sweet_record['SweetName'] . "<br>";
    echo "<p> Availability: " . $this_sweet_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_sweet_record['Cost'] . "<br>";
    ?>

    <h3>Other Sweet Items</h3>

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

</main>
