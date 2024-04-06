<?php
    session_start();
    if (!isset($_SESSION['UNIQUE_ID'])) {
    header("Location:index1.php");
    exit(); 
    }
    $server = "localhost";
    $username = "root";
    $password = "";
    
    $con  = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
    if (isset($_POST['fav'])) {
    if (isset($_POST['recipe_id'])) {
        $recipe_id = mysqli_real_escape_string($con, $_POST['recipe_id']);
        $name = mysqli_real_escape_string($con, $_SESSION['Name']);

        // Retrieve the selected recipe details based on its ID
        $sql = "SELECT * FROM `logintable`.`recipes` WHERE recipe_id = '$recipe_id'"; // Updated here
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        // Insert the selected recipe into favorites
        $title = mysqli_real_escape_string($con, $row['title']);
        $summary = mysqli_real_escape_string($con, $row['Summary']);
        $img = "'" . mysqli_real_escape_string($con, $row['img']) . "'";

        $sql1 = "INSERT INTO `logintable`.`favourite` (Name, title, description, img) VALUES ('$name', '$title', '$summary', $img)";
        if ($con->query($sql1) === true) {
            // echo "Successfully Inserted";
            $insert = true;
        } else {
            echo "ERROR: $sql1 <br> $con->error";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linking Css -->
    

    <!-- Linging favicon -->
    <link rel="icon" href="css/cook-book.ico">

    <!-- Linking Bootstrap -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/recipe1.css">
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
<!-- -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href=""> <span><img src="images/chef-hat.ico" alt=""> FlavorForge</span></a>
            <ul class="navbar-nav ms-lg-auto pe-xxl-3 ">
                <li class="nav-item px-2  ">
                    <a class="nav-link active " href="afterlogin.php">Home</a>
                </li>
                <li class="nav-item px-2 active1">
                    <a class="nav-link active li" href="">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active" href="contact1.php">Contact Us</a>
                </li>
                <li class="nav-item  px-2 mt-2">
                    <a href="profile1.php"><img src="images/chef1.png" alt="" class="profile"></a>
                </li>
            </ul>
        </div>
    </nav>
    <h1><center>Recipes</center></h1>    
    <div class="container mt-4">
        <?php
    $sql = "SELECT * FROM `logintable`.`recipes` WHERE status = 'approved'";
    $result = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='first'>
        <div id='con'>
            <p><i>Title: </i>{$row['title']}</p>
            <p><i>From: </i> {$row['Name']}</p>
              
            <p><i>Description: </i>{$row['Summary']}</p>
            <form  method='post'>
                <input type='hidden' name='recipe_id' value='{$row['recipe_id']} '>
                <input type='submit' value='+ Favourites' name = 'fav'>
            </form>
            </div>
            <div id='img-con'>
            <img src='{$row['img']}' class ='img'>
            </div>
            
        </div>";
        
    }



    ?>
    </div>
</body>
</html>