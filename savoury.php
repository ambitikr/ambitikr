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
    <h2>Search a Savoury Item</h2>

    <form action="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
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

    <h2>Savory Item Information</h2>

    <?php
    echo "<p> Item Name: " . $this_savory_record['SavoryName'] . "<br>";
    echo "<p> Availability: " . $this_savory_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_savory_record['Cost'] . "<br>";
    ?>


    <h2> Show Certain Things</h2>

    <form action="savoury.php" method="post">
        <input type='submit' name='testquery1' value="Click Button to Display all Savory Items">
    </form>

    <?php
    if(isset($_POST['testquery1']))
    {
        $result=mysqli_query($con, "SELECT SavoryName, Stock, Cost FROM savoryitems");
        if(mysqli_num_rows($result)!=0)
        {
            while($test = mysqli_fetch_array($result))
            {
                $id = $test['SavoryName'];
                echo "<table>";
                echo "<tr>";
                echo "<tr>". "<p> Savory Item Name: " . $test['SavoryName'] ."</tr>";
                /*echo "<tr>". $test['DrinkName']. "</tr>";*/
                echo "<p> Cost: " . $test['Cost'] . "<br>";
                /*echo "<tr>". $test['Cost']. "</tr>";*/
                echo "<p> Availability: " . $test['Stock'] . "<br>";
                /*echo "<tr>". $test['Available'];*/
                echo "</tr>";
                echo "</table>";
            }
        }
    }
    ?>

</main>



