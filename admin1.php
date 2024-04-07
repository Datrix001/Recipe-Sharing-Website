<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "logintable"; 
    
    

    $con = mysqli_connect($server, $username, $password, $database); // Include database name here
    
    
    
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    $recipe_id = mysqli_real_escape_string($con, $_GET['recipe_id']);

    $sql = "SELECT * FROM `logintable`.`recipes` WHERE recipe_id=$recipe_id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['approve'])) {
        $status = "approved";
        $recipe_id = $_POST['recipe_id']; 
        
        
        $sql2 = "UPDATE `logintable`.`recipes` SET `status` = '$status' WHERE `recipe_id` = $recipe_id";
        if (mysqli_query($con, $sql2)) {
           
            $insert = true;
            header("Location: admin.php");  
        } else {
            echo "ERROR: $sql2 <br> " . mysqli_error($con);
        }
    }
   
    elseif (isset($_POST['reject'])) {
        $status = "rejected";
        $recipe_id = $_POST['recipe_id']; 
        
        
        $sql2 = "UPDATE `logintable`.`recipes` SET `status` = '$status' WHERE `recipe_id` = $recipe_id";
        if (mysqli_query($con, $sql2)) {
            // echo "Recipe rejected successfully";
            $insert = true;
            header("Location: admin.php");
        } else {
            echo "ERROR: $sql2 <br> " . mysqli_error($con);
        }
    }
}

?>

<html>
<head>
<!-- Linging favicon -->
<link rel="icon" href="css/cook-book.ico">

<!-- Linking Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin1.css">
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
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

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
                <li class="nav-item px-2 ">
                    <a class="nav-link active" href="afterLogin.php">Home</a>
                </li>
                <li class="nav-item px-2 ">
                    <a class="nav-link active " href="recipe1.php">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active " href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item  px-2 mt-2">
                    <a href="profile.php"><img src="images/chef1.png" alt="" class="profile"></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4 ">
        <?php
        echo"
            <h2><i></i>{$row['title']}</h2>
            <p><i>By: </i> {$row['Name']}</p>
            <p class ='para'>{$row['Summary']}</p>
            <img src ='{$row['img']}' class ='img'>  
            <p class ='para1'>{$row['description']}</p>
            <form method='POST'>
                <input type='hidden' name='recipe_id' value='{$row['recipe_id']}'>
                <input type='submit' class='bt' name='approve' value='Approve'>
                <input type='submit' class='bt' name='reject' value='Reject'>
            </form>
        "
        ?>
    </div>