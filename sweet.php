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
        <h2>Search a Sweet Item</h2>

        <form action="" method="post">
            <input type="text" name='search'>
            <input type="submit" name="submit" value="Search">
        </form>

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
                    echo $row ['SweetName'];
                    echo ": $";
                    echo $row ['Cost'];
                    echo " ---- Availability:";
                    echo $row ['Stock'];
                    echo"<br>";
                }
            }
        }
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
    <h2>Sweet Item Information</h2>
    <?php
    echo "<p> Item Name: " . $this_sweet_record['SweetName'] . "<br>";
    echo "<p> Availability: " . $this_sweet_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_sweet_record['Cost'] . "<br>";
    ?>
    
</main>
