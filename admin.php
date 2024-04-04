<?php
    
    $server = "localhost";
    $username = "root";
    $password = "";
    
    
    
    $con  = mysqli_connect($server,$username,$password);
    session_start();
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
?>


<!-- Linging favicon -->
<link rel="icon" href="css/cook-book.ico">

<!-- Linking Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin.css">
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
                    <a class="nav-link active " href="">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active " href="">Contact Us</a>
                </li>
                <li class="nav-item  px-2 mt-2">
                    <a href="profile.php"><img src="images/chef1.png" alt="" class="profile"></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1><center>Admin Panel</center></h1>
    </div>
</body>
</html>    