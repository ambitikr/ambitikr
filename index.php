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
    <title>WGC CANTEEN</title>
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
                    <a href="sweet.php">SWEET ITEMS MENU</a>
                </div>
            <li> <a href='contacts.php'>INFORMATION</a></li>
            <li> <a href='specials.php'> WEEKLY SPECIALS</a></li>
        </ul>
    </nav>
</header>
<div class="bg"></div>

<p></p>
<p style = "font-family: Aparajita;/*font-family:georgia,garamond,serif;*/font-size:24px;/*font-style:italic;*/">
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
    If you are willing to look through our Vegan and Gluten Free menu head onto our All Menus page under the Menu bar on the nav bar
    <br>

    </br>
    For our weekly specials click on 'Weekly Specials' the nave bar. We have weekly package deals with one savory and one
    sweet items at only $3.99
    </p>

<meta name="viewport" content="width=device-width, initial-scale=1" >

</head>
<body>

<h2>WEEKLY SPECIALS</h2>
<p>Check our Weekly Specials page to see the rest!</p>

<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Chocolate_Cupcakes_with_Raspberry_Buttercream_detail.jpg" alt="Picture of Chocolate Cupcake" width="800" height="600">
        <div class="slideshow_text">Chocolate Cupcake</div>
    </div>

    <div class="mySlides fade">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyer-c-K1FcYpz0tOReAwNJFalBVfPXyXFTQ&usqp=CAU" alt="Picture of Fudge" width="800" height="600">
        <div class="slideshow_text">Fudge</div>
    </div>

    <div class="mySlides fade">
        <img src="https://p1.pxfuel.com/preview/311/545/138/salad-sandwiches-lunch-bread.jpg" alt="Picture of Veg Sandwich" width="800" height="600">
        <div class="slideshow_text">Sandwich(VEG)</div>
    </div>

    <div class="mySlides fade">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Blueberry_muffin%2C_wrapped.jpg" alt="Picture of Blueberry Cupcakes" width="800" height="600">
        <div class="slideshow_text">Blueberry Cupcake</div>
    </div>

    <div class="mySlides fade">
        <img src="https://live.staticflickr.com/4033/4390905480_14d4a50528_b.jpg" alt="Picture of Caramel Slices" width="800" height="600">
        <div class="slideshow_text">Caramel Slice</div>
    </div>

    <div class="mySlides fade">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/Fries_2.jpg" alt="Picture of Potato Fries" width="800" height="600">
        <div class="slideshow_text">Fries</div>
    </div>

    <div class="mySlides fade">
        <img src="https://p2.piqsels.com/preview/263/414/444/food-ramen-noodles-cooking-thumbnail.jpg" alt="Picture of 2 minute noodles" width="800" height="600">
        <div class="slideshow_text">2 Min Noodles</div>
    </div>


</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>


</body>
