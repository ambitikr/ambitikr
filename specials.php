<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_cafe2021");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
    echo PHP_VERSION;
}

/*if(isset($_GET['specials'])){
    $id = $_GET['specials'];
}else{
    $id = 1;
}*/
$this_specials_query = "SELECT specials.SpecID, specials.Days, savoryitems.SavoryName, savoryitems.Stock, savoryitems.Cost, sweets.SweetName, sweets.Stock, sweets.Cost 
FROM specials, savoryitems, sweets 
WHERE specials.SavoryID = savoryitems.SavoryID 
AND specials.SweetID = sweets.SweetID ";
$this_specials_result = mysqli_query($con, $this_specials_query);
while ($row = mysqli_fetch_assoc($this_specials_result))
{
    echo $row['SpecID'];
}

$this_specials_record = mysqli_fetch_assoc($this_specials_result);

/* Specials Query from Index page*/
$all_specials_query = "SELECT SpecID FROM specials ORDER BY SpecID ASC";
$all_specials_result = mysqli_query($con, $all_specials_query);
?>

<!DOCTYPE html>

<html lang="en">
<body style="background-color:#757374;">
<head>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">
        WGC CANTEEN</p>
    <meta charset="utf-8"
    <link rel='stylesheet' type='text/css' href = 'style.css'
</head>

<body>
<header>
    <p style = "font-family:georgia,garamond,serif;font-size:30px;font-style:italic;">
        SPECIALS</p>
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

    <div class="bg"></div>
    <p></p>
    <p style = "font-family:georgia,garamond,serif;font-size:40px;font-style:italic;color: #C3CED2;">
        75% off on all mentioned items!</p>

    <?php
    echo "<p> Day: " . $this_specials_record['Days'] . "<br>";
    echo "<p> Sweet Item: " . $this_specials_record['SweetName'] . "<br>";
    echo "<p> Stock: " . $this_specials_record['Stock'] . "<br>";
    echo "<p> Cost: " . $this_specials_record['Cost'] . "<br>";
    ?>

    <h2>Specials Information</h2>
    <form name='specials_form' id='specials_form' method = 'get' action = 'specials.php'>
        <select id = 'specials' name = 'specials'>
            <?php
            while($all_specials_record = mysqli_fetch_assoc($all_specials_result)) {
                echo "<option value = '". $all_specials_record['SpecID'] . "'>";
                echo $all_specials_record['Days'];
                echo "</option>";
            }
            ?>

        </select>
        <input type='submit' name='specials_button' value='Show me the order information'>
    </form>

</header>


    /* SELECT specials.SpecID, specials.Days, savoryitems.SavoryName, savoryitems.Stock, savoryitems.Cost, sweets.SweetName, sweets.Stock, sweets.Cost
    FROM specials, savoryitems, sweets
    WHERE specials.SavoryID = savoryitems.SavoryID
    AND specials.SweetID = sweets.SweetID AND specials.SpecID*/

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
</body>