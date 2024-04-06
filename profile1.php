<?php
    session_start();
    if (!isset($_SESSION['UNIQUE_ID'])) {
    header("Location:index1.php");
    exit(); 
}



    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "logintable"; 
    
    

    $con = mysqli_connect($server, $username, $password, $database); // Include database name here
    
    
    
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    
    if(isset($_POST["Full_Name"]) && isset($_POST["Phone_Number"]) && isset($_POST["Country"])) {


        
        $unique_Id = $_SESSION['UNIQUE_ID'];
        $sql = "SELECT * FROM `logintable`.`reg` WHERE  UNIQUE_ID = '{$_SESSION['UNIQUE_ID']}'";
        $sql1 = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($sql1);
            
        // Assign values from POST to variables
        $Full_Name = $_POST["Full_Name"];
        $Phone_NO = $_POST["Phone_Number"];
        $Country = $_POST["Country"];
        $R_ID = $row["Sno"];
        
        // SQL query to insert data into 'user' table
        $sql = "INSERT INTO `user` (`Full Name`, `Phone Number`, `Country`,`R_ID`) VALUES ('$Full_Name', '$Phone_NO', '$Country','$R_ID')";
        
        if ($con->query($sql) === true) {
            $insert = true;
        } else {
            echo "ERROR: $sql <br> $con->error";
        }
    }
?>

<!-- Linging favicon -->
<link rel="icon" href="css/cook-book.ico">    

<!-- Linking Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/profile1.css">
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
    <?php
        $unique_Id = $_SESSION['UNIQUE_ID'];
        $sql = "SELECT * FROM `logintable`.`reg` WHERE  UNIQUE_ID = '{$_SESSION['UNIQUE_ID']}'";
        $sql1 = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($sql1);
    ?>
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
            <h4 class="current"><img src="images/user.png" alt="" class="img">&nbsp User Info</h4>
            <h4 class="h4"><img src="images/heart1.png" alt="" class="img"><a href="favourite.php">&nbsp  Favourite</a></h4>
            <h4 class="h4"><img src="images/key1.png" alt="" class="img">&nbsp <a href="password.php">Password</a></h4>
            <h5 class="h4"><img src="images/bell1.png" alt="" class="img">&nbsp <a href="notification.php">Notification</a></h4>
            <h5 class="h5"><img src="images/power.png" alt="" class="img">&nbsp<a href="logout.php">Logout</a></h5>
        </div>
        <div class ="column2">
            <img src="images/profile1.png" alt="" class = "img1">
            <h1 class="topic1"><?php echo ucfirst($row["Name"]); ?></h1>
            
            <div class="row">
                <div class ="col-lg-6">
                    <form action="" method = "POST">
                        Name <br>
                        <input type="text" placeholder ="<?php echo ucfirst($row["Name"]);?>" disabled><br>
                        Email <br>
                        <input type="email" placeholder ="<?php echo $row["Email"];?>" disabled> <br>
                        
                    </form>
                </div>
                <div class = "col-lg-2">
                    <form action="" method = "POST">
                        Full Name <br>
                        <input type="text" name="Full_Name" placeholder=" " ><br>
                        Phone Number <br>
                        <input type="text" name = "Phone_Number"><br>
                        <b class="country">Country</b> <br>
                        <input type="text" name = "Country" class='country'><br>
                        
                        <input type="submit" value="Save Changes" class="save">
                    </form>
                </div>
            </div>

        </div>
    </div>

        
</body>
</html>




