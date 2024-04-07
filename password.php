<?php
    session_start();
   if (!isset($_SESSION['UNIQUE_ID'])) {
    header("Location:index1.php");
    exit(); 
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
    
    if(isset($_POST["current"]) && isset($_POST["new"]) && isset($_POST["confirm"])) {

        
        
        
        $unique_Id = $_SESSION['UNIQUE_ID'];
        $sql = "SELECT * FROM `logintable`.`reg` WHERE  UNIQUE_ID = '{$_SESSION['UNIQUE_ID']}'";
        $sql1 = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($sql1);
         
        $current = $_POST["current"];
        $new = $_POST["new"];
        $confirm = $_POST["confirm"];   
        
        if ($new == $confirm){
            if($current == $row["Password"]){
                $sql = "UPDATE `logintable`.`reg` SET Password = '{$new}' , Confirm_Password = '{$confirm}'  WHERE UNIQUE_ID = '{$_SESSION['UNIQUE_ID']}' ";
                
                $pass2 = false;
                if ($con->query($sql) === true) {
                    $insert = true;
                } else {
                    echo "ERROR: $sql <br> $con->error";
                }
            }
            else{
                $pass1 = false;
                
            }}else{
                $pass3 = false;
            }
        
    }
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
                    <a class="nav-link active" href="recipe1.php">Recipes</a>
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
    <?php
        if(!$pass1){
                    echo"<div class='alert alert-secondary bg-warning' role='alert'>
                        Wrong Password Entered!!
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            }
        
        if(!$pass2){
                    echo"<div class='alert alert-secondary bg-success' role='alert'>
                        Password Changed Successfully!!
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            } 
        
        if(!$pass3){
                    echo"<div class='alert alert-secondary bg-warning' role='alert'>
                        Confirm Password is not same!!
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            }    
    ?>
    <div class="container">
        <div class="column1">
            
            <h2 class="name"><b>User Profile</b></h2>
            <h4 class="h4"><img src="images/user1.png" alt="" class="img">&nbsp <a href="profile1.php">User Info</a></h4>
            <h4 class="h4"><img src="images/heart1.png" alt="" class="img"><a href="favourite.php">&nbsp  Favourite</a></h4>
            <h4 class="current"><img src="images/key.png" alt="" class="img">&nbsp Password</h4>
            <h5 class="h4"><img src="images/bell1.png" alt="" class="img"><a href="notification.php">&nbsp Notification</a></h4>
            <h5 class="h5"><img src="images/power.png" alt="" class="img">&nbsp<a href="logout.php">Logout</a></h5>
        </div>
        <div class ="column2">
            <h1>Change Password</h1>
            <form action="" method="POST">
                    <b class="h3">Current Password</h4><br>
                    <input type="password" name ="current"><br>
                    <b class="h3">New Password</h4><br>
                    <input type="password" name ="new"><br>
                    <b class="h3">Confirm Password</h4><br>
                    <input type="password" name ="confirm"><br>
                    <input type="submit">
            </form>
        </div>
    </div>

        
</body>
</html>




