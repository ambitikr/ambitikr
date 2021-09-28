<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo " ";
}
?>

<!DOCTYPE html>

<html lang="en">
<head>

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


<div class="bg"></div>
<p></p>
<p style = "font-family:georgia,garamond,serif;font-size:20px;font-style:italic;">
    Welcome to the WGC Canteen, above are the links to any information you would like to find out about our canteen
    <br>
    Here in Wellington Girls College (WGC) we offer a variety of options for our students, selling three different
    <br>
    kinds of food, sweet, savory and sour. This range offers a wide choice and its not just for our students, your welcome
    to join any day!
    <br>

    </br>
    We also have some Vegan and Gluten free food. So feel free to come during lunch and morning tea!
    <br>

    </br>
    For our weekly specials click on 'Weekly Specials' the nave bar. We have weekly package deals with one savory and one
    sweet items at only $3.99
</p>

</body>
