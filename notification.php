<?php
    session_start();
   if (!isset($_SESSION['UNIQUE_ID'])) {
    header("Location:index1.php");
   
}
    

    $server = "localhost";
    $username = "root";
    $password = "";
    
    $pass1 = true;
    $pass2 = true;
    $pass3 = true;

    $con = mysqli_connect($server, $username, $password); 
    
    
    
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `logintable`.`recipes` WHERE Name = '{$_SESSION['Name']}'";
    $result = mysqli_query($con, $sql); 
    
    
    
?>
<html>
<!-- Linging favicon -->
<link rel="icon" href="css/cook-book.ico">    

<!-- Linking Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/password.css">
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
                <li class="nav-item px-2 ">
                    <a class="nav-link active" href="afterLogin.php">Home</a>
                </li>
                <li class="nav-item px-2 ">
                    <a class="nav-link active" href="">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item  px-2 mt-2">
                    <img src="images/chef1.png" alt="" class="profile">
                </li>
                
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="column1">
            
            <h2 class="name"><b>User Profile</b></h2>
            <h4 class="h4"><img src="images/user1.png" alt="" class="img">&nbsp <a href="profile1.php">User Info</a></h4>
            <h4 class="h4"><img src="images/heart1.png" alt="" class="img"><a href="favourite.php">&nbsp  Favourite</a></h4>
            <h4 class="h4"><img src="images/key1.png" alt="" class="img"><a href="password.php">&nbsp Password</a></h4>
            <h4 class="current"><img src="images/bell.png" alt="" class="img">&nbsp Notification</h4>
            <h5 class="h5"><img src="images/power.png" alt="" class="img">&nbsp<a href="logout.php">Logout</a></h5>
        </div>
        <div class ="column2">
            <h1><center>Notification</center></h1>
            <?php 
           if (mysqli_num_rows($result) > 0) {
            $sno = 0; 
            while ($sql1 = mysqli_fetch_assoc($result)) {
                $sno = $sno +1;
                if ($sql1['status'] == 'rejected') {
                    echo '<h2>' . $sno . '. Your recipe ' . $sql1['title'] . ' was rejected</h2><br>';
                } elseif ($sql1['status'] == 'approved') {
                    echo '<h2>' . $sno . '. Your recipe ' . $sql1['title'] . ' was approved</h2><br>';
                } else {
                    echo '<h2>' . $sno . '. No notification for ' . $sql1['title'] . ' Right Now</h2>';
                }
            }
    } else {
        
        echo '<h2>No notification Right Now</h2>';
    }
        
            ?>
        </div>
    </div>

</body>
</html>


