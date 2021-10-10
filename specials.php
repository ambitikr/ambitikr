<?php
$con = mysqli_connect("localhost", "ambitikr", "smallfeet14", "ambitikr_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

if(isset($_GET['specials'])){
    $id = $_GET['specials'];
}else{
    $id = 1;
}

$this_specials_query = "SELECT specials.SpecID, specials.Days, savoryitems.SavoryName, savoryitems.Stock, savoryitems.Cost, sweets.SweetName, sweets.Stock, sweets.Cost 
FROM specials, savoryitems, sweets 
WHERE specials.SavoryID = savoryitems.SavoryID 
AND specials.SweetID = sweets.SweetID AND specials.SpecID = '"   . $id . "'";
$this_specials_result = mysqli_query($con, $this_specials_query);
$this_specials_record = mysqli_fetch_assoc($this_specials_result);

/* Specials Query from Index page*/
$all_specials_query = "SELECT SpecID, Days FROM specials ORDER BY specials.SpecID ASC, specials.Days";
$all_specials_result = mysqli_query($con, $all_specials_query);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>WEEKLY SPECIALS</title>
    <p style = "font-family:georgia,garamond,serif;font-size:50px;font-style:italic;">WGC CANTEEN</p>
    <meta charset="utf-8"
    <link rel="stylesheet" href = "css/custom-style.css"/>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <p style = "font-family:georgia,garamond,serif;font-size:30px;font-style:italic;"> WEEKLY SPECIALS</p>
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

    <div class="bg"></div>
    <p style = "font-family:georgia,garamond,serif;font-size:40px;font-style:italic;color: black;">
        All mentioned items are Package deals for only $3.99!</p>

    <h2>Specials Information</h2>
    <form name='specials_form' id='specials_form' method = 'get' action = 'specials.php'>
        <select id = 'specials' name = 'specials' style = "font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; text-decoration-color:white;">
            <?php
            while($all_specials_record = mysqli_fetch_assoc($all_specials_result)) {
                echo "<option value = '". $all_specials_record['SpecID'] . "'>";
                echo $all_specials_record['Days'];
                echo "</option>";
            }
            ?>

        </select>
        <input type='submit' name='specials_button' value='Show me the order information' style = "background-color: #bbbbbb; font-size:15px; /*font-style:italic;*/ font-family:georgia,garamond,serif; text-decoration-color:white;">
    </form>

    <?php
    echo "<p> Day: " . $this_specials_record['Days'] . "<br>";
    echo "<p> Sweet Item: " . $this_specials_record['SweetName'] . "<br>";
    echo "<p> Savory Item: " . $this_specials_record['SavoryName'] . "<br>";
    ?>

    <h3>Package Deal: Both Savory and Sweet Item together is only $3.99</h3>

</header>




<meta name="viewport" content="width=device-width, initial-scale=1" >

</head>
<body>

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