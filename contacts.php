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
    <title>INFORMATION</title>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">
        WELLINGTON GIRLS COLLEGE CANTEEN</p>
    <meta charset="utf-8"
    <link rel="stylesheet" href = "css/custom-style.css"/>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>

    <h1>INFORMATION</h1>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME</a></li>
            <li class="dropdown">
                <button class="dropbtn" style = "background-color: #333;font-family:georgia,garamond,serif;font-size:15px; "> MENU ⮟</button>
                <div class="dropdown-content">
                    <a href="menu.php">ALL MENU</a>
                    <a href="drinks.php">DRINKS MENU</a>
                    <a href="savoury.php">SAVORY ITEMS MENU</a>
                    <a href="sweet.php">SWEET ITEMS MENU</a>
                </div>
            <li> <a href='contacts.php'>INFORMATION</a></li>
            <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
        </ul>
    </nav>
</header>

<div class="bg"></div>


<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<body>
<h2>Open Timings</h2>
<center>
<table style="width:50%">
    <tr>
        <th>Days</th>
        <th>Open Timings - Interval</th>
        <th>Lunch</th>
    </tr>
    <tr>
        <td>Monday</td>
        <td>10:30-11:10am</td>
        <td>12:45-1:35pm</td>
    </tr>
    <tr>
        <td>Tuesday</td>
        <td>10:30-11:10am</td>
        <td>12:45-1:35pm</td>

    </tr>
    <tr>
        <td>Wednesday</td>
        <td>11-11:20am</td>
        <td>12:55-1:45pm</td>

    </tr>
    <tr>
        <td>Thursday</td>
        <td>10:30-11:10am</td>
        <td>12:45-1:35pm</td>

    </tr>
    <tr>
        <td>Friday</td>
        <td>10:20-11:10am</td>
        <td>12:45-1:35pm</td>

    </tr>
</table>
</center>
<h3>Contacts</h3>
<p style = "font-family:georgia,garamond,serif;font-size:17px;font-style:italic;">Email: wgccanteen@wgc.school.nz</p>
<p style = "font-family:georgia,garamond,serif;font-size:17px;font-style:italic;">Phone Number: 0123456789 9999</p>


<!-- Add font awesome icons -->
<center>
<a href="https://www.facebook.com/WellingtonGirlsCollegeNZ/" class="fa fa-facebook"></a>
<a href="https://wgc.school.nz/" class="fa fa-google"></a>
<a href="https://www.instagram.com/wgcteamteal/?hl=en" class="fa fa-instagram"></a>
</center>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<h2 style = "text-align: left; font-family:georgia,garamond;">Address: </h2>
<div class="mapouter">
    <div class="gmap_canvas">
        <iframe width="589" height="524" id="gmap_canvas" src="https://maps.google.com/maps?q=Pipitea%20Street,%20Thorndon,%20Wellington%206011&t=&z=13&ie=UTF8&iwloc=&output=embed"
                frameborder="5"
                scrolling="no"
                marginheight="0"
                marginwidth="0">

        </iframe><a href="https://putlocker-is.org"></a>
        <br>
        <a href="https://www.embedgooglemap.net"></a>
    </div></div>

</body>