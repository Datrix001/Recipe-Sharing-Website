<?php
    $pass = true;
    $acc = false;
    if(isset($_POST['name'])){    
    
    // Set Connection variable
    $server = "localhost";
    $username = "root";
    $password = "";
    
    //Create Connection
    $con = mysqli_connect($server, $username, $password);

    //Check for connection success
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
    // echo "Success: Connection to the database established!";

    
    //collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passw = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    

    if ($passw == $confirm_password){

    $random_num = rand(1000000,99999999);    
    $sql = "INSERT INTO `logintable`.`reg` ( `Name`, `Email`, `Password`, `Confirm_Password`, `Date_Time`,`UNIQUE_ID`) VALUES ('$name', '$email', '$passw', '$confirm_password', current_timestamp(),$random_num);";
    
    //execute the query
    if($con->query($sql) == true){
        // echo "Successfully Inserted";
        $insert = true;

    }
    else{
        echo "ERROR: $sql <br> $conn->error";
    }
    $acc = true;
     $con-> close();  
}else{
    $pass = false;
}}
?>
<?php
    $log = true;
    // login side back work
   if (isset($_POST['loginName']) && isset($_POST['loginPassword'])) {
    
    // Set Connection variable
    $server = "localhost";
    $username = "root";
    $password = "";
    
    //Create Connection
    $con = mysqli_connect($server, $username, $password);

    //Check for connection success
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
    // echo "Success: Connection to the database established!";
        session_start();
        $login = $_POST['loginName'];
        $password = $_POST['loginPassword'];
        
        if($login=="admin" && $password=="admin"){
          header("Location: admin.php");  } 
        
        else{$loginName = $_POST['loginName'];
        $loginPassword = $_POST['loginPassword'];
        $sql1 = "SELECT * FROM `logintable`.`reg` WHERE Name = '{$loginName}' AND Password= '{$loginPassword}'";
            
        $query = mysqli_query($con,$sql1);
        $row = mysqli_fetch_assoc($query);
        if($row == null){
            $log = false;
        }else{
                $_SESSION['UNIQUE_ID'] = $row['UNIQUE_ID']; 
                $_SESSION['R_ID'] = $row['S_no']; 
                $_SESSION['Name'] = $row['Name'];
                header("Location: afterLogin.php");
        }
        
        $con-> close();  
        $pass = true;
    }
    }
    elseif(isset($_POST['loginName']) && isset($_POST['loginPassword'])){
       $login = $_POST['loginName'];
       $password = $_POST['loginPassword'];
        if($login=='admin'&& $password=='admin'){
          header("Location: admin.php");  
        }
    }

           
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Linging favicon -->
<link rel="icon" href="css/cook-book.ico">

<!-- Linking Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/LoginStyles.css">
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
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item px-2 ">
                    <a class="nav-link active" href="">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active" href="contact1.php">Contact Us</a>
                </li>
                
                <li class="nav-item btn-shadow px-2 ms-3 back active2">
                    <a class="nav-link active lin active3" href="">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
            if($log == false){
                    echo"<div class='alert alert-secondary bg-warning' role='alert'>
                        Account not found!!
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            }

            if(!$pass){
                    echo"<div class='alert alert-secondary bg-warning' role='alert'>
                        Confirm Password is not same as Password
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            }
            if($acc == true){
                    echo"<div class='alert alert-secondary bg-info' role='alert'>
                        Congratulation!! Account Created.
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            }
            ?>
        <div class="container">
            <div class="LeftSide">
                <h2 class="leftH1">Login</h2>
                <form action="" method="post" class="form">
                    <input type="text" class="text-box" name="loginName" placeholder="User Name" required> <br>
                    <input type="password" class="text-box" name ="loginPassword" placeholder="Password" required> <br>

                    <input type="checkbox">Remember Me  <br>
                    <button type="submit" class="submit">Submit</button>
                </form>
            </div>
            <?php

            ?>
            
            <div class="RightSide">
                <h1 class="rightH2">Create Your Account</h1>
                <p class="rightPara">by using email for registration</p>
                <form action="" method="post" class="rightForm">
                    <input type="text" class="text-box" name ="name"placeholder="Name" required><br>
                    <input type="text" class="text-box" name = "email" placeholder="Email" required><br>
                    <input type="password" class="text-box" name = "password" placeholder="Password" required><br>
                    <input type="password" class="text-box" name="confirm_password" placeholder="Confirm Password" required><br>
                    <input type="checkbox" required> Terms & Condition <br>
                    <button type="submit" class="submit">Submit</button>
                </form>
                <div class="content" id="content">
                    <div class="content1">
                        <h1 class="rightH1">Hello, Chefs!</h1>
                        <p id="contentp" class="contentp">Register with your personal details to start <br>with your cooking journey </p>
                    </div>
                    <div class="content2">
                        <h1 class="rightH1">Welcome Back!</h1>
                        <p id="contentp" class="contentp">To keep connected with us please <br>login with your personal info </p>
                    </div>
                    <button class="signup" id="sd">Signup</button>
                </div>
                
            
        </div>
    <script src="login.js"></script>  
    <!-- <script src="home.js"></script>   -->
</body>
</html>
