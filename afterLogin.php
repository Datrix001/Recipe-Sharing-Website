<?php
    session_start();
      if (!isset($_SESSION['UNIQUE_ID'])) {
    header("Location:index1.php");
    exit();
}

    $server = "localhost";
    $username = "root";
    $password = "";
    
    
    
    $con  = mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }

    
?>


<!-- Linging favicon -->
<link rel="icon" href="css/cook-book.ico">

<!-- Linking Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/firstPage.css">
<!-- Linking Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
<title>FlavorForge</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <span><img src="images/chef-hat.ico" alt=""> FlavorForge</span></a>
            <ul class="navbar-nav ms-lg-auto pe-xxl-3 ">
                <li class="nav-item px-2 active1">
                    <a class="nav-link active li" href="">Home</a>
                </li>
                <li class="nav-item px-2 ">
                    <a class="nav-link active" href="recipe1.php">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item  px-2 mt-2">
                    <a href="profile1.php"><img src="images/chef1.png" alt="" class="profile"></a>
                </li>
            </ul>
        </div>
    </nav>

     <div class="background-1">
        <div class="row">
            <div class="col-lg-5 px-5">
                <h1>Indulge in delicious dishes, each bite a culinary delight.</h1>
            </div>
            <div class="px-5 py-3">
                <button class="btne">Try It Out</button>
            </div>
        </div>
    </div>
    <div class="con">
        <div class="img-contain">
            <div class="semi"></div>
            <img src="images/114-modified.png" alt="" class="about">
        </div>
        <p class="para"><b>About Us </b><br><br>Welcome to Flavour Forge, where food enthusiasts unite to share, discover, and delight in the world of cooking.
        From seasoned chefs to kitchen novices, our platform invites everyone to explore recipes, exchange ideas, and connect
        with like-minded individuals. Founded on the belief that food has the power to create connections and moments, Flavour
        Forge is a hub for culinary inspiration and community collaboration. Join us on this delicious journey as we
        celebrate the joy of cooking and the richness of food culture together. Thank you for being a part of our vibrant
        community. Let's cook, create, and savor the magic of food together!</p>
    </div>

    <div class="second">
        <h2>Popular Recipes You Can't Miss</h2>
        <h3>From comfort foof classic to exotic flavours our featured</h3>
        <h3>recipes are sure to impress.</h3>
        
        <div class="boxing">
       

            <div class="ggdf">
                <a href="recipe1.php" class="linked">
                    <img src="images/99.webp" class="imgd">
                    <p><b class="hen menu"><a href="" class="linked">Spaghetti Carbonara</a></b><br><h3> A classic Italian pasta dish made with spaghetti, eggs, <br>pancetta or bacon, cheese, and black pepper.</h3></p>
                </a>
            </div>

            <div class="ggdf">
                <a href="recipe1.php" class="linked">
                    <img src="images/100.webp" alt="" class="imgd">
                    <p><b class="hen menu"><a href="" class="linked">Grilled Cheese Sandwich</a></b><br><h3>A comfort food favorite made with bread, cheese, <br>and butter, toasted until golden brown and gooey</h3></p>
                </a>
            </div>

            <div class="ggdf">
                <a href="recipe1.php" class="linked">
                    <img src="images/101.webp" alt="" class="imgd">
                    <p><b class="hen menu"><a href="" class="linked">Chocolate Chip Cookies</a></b><br><h3> A beloved dessert consisting of butter, sugar, eggs,<br> flour, and chocolate chips, baked until soft and chewy.</h3></p>
                </a>
            </div>
            
    </div>

    <div class="third">
        <div class="col-lg-4 px-3 pt-0 ">
            <h1 class="gghg">Contact Us</h1>
        </div>
        <div class="col-lg-4 ">
            <h3 class="down"><b class="hen">
                Adresss
            </b><br>
            Model Colony, Shivajinagar, Pune <br><br>
            <b class="hen">
                Phone Number <br>
            </b>
            +91 9356798742 <br><br>
            <b class="hen">
                Email <br>
            </b>
            flavourforge@gmail.com <br><br>
            <b class="hen">
                Follow Us on<br>
            </b>
            <img src="images/instagram.png"  class="insta"> <img src="images/yaotube.png" class="insta"><img src="images/twitter.png" class="insta">
            </h3>
        </div>
    </div>


       
    <script src="home.js"></script>  
</body>

</html>
