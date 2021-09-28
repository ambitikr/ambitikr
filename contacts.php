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
<body style="background-color:#C3CED2;">
<head>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">
        WELLINGTON GIRLS COLLEGE CANTEEN</p>
    <meta charset="utf-8"
    <link rel='stylesheet' type='text/css' href = 'style.css'
</head>

<body>
<header>

    <h1>INFORMATION</h1>
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
            <li> <a href='contacts.php'> INFORMATION</a></li>
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

<p>Email: wgccanteen@wgc.school.nz</p>
<p>Phone Number: 0123456789 9999</p>

<!-- Add font awesome icons -->
<center>
<a href="https://www.facebook.com/WellingtonGirlsCollegeNZ/" class="fa fa-facebook"></a>
<a href="https://wgc.school.nz/" class="fa fa-google"></a>
<a href="https://www.instagram.com/wgcteamteal/?hl=en" class="fa fa-instagram"></a>
</center>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .fa {
        padding: 20px;
        font-size: 30px;
        width: 30px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-google {
        background: #0992B2;
        color: white;
    }

    .fa-instagram {
        background: #C3CED5;
        color: white;
    }

</style>
<p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">
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
        <style>
            .mapouter {
                position:relative;
                text-align:right;
                height:524px;
                width:589px;
            }
        </style><a href="https://www.embedgooglemap.net"></a>
        <style>
            .gmap_canvas {
                overflow:hidden;
                background:none!important;
                height:524px;
                width:589px;}
        </style>
    </div></div>

<style>
    h1 {text-align: center;}
    h2 {text-align: center;}
    h3 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}
    form {text-align: center;}
</style>

<style>

    p {
        color: black;
        font-family: font-family:georgia,garamond,serif;
        font-size:20px;
        font-style:italic
    }
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