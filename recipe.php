<?php

    $insert = true;

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "logintable";
    //Create Connection
    $con = mysqli_connect($server, $username, $password,$database);

    //Check for connection success
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }

    session_start();
    // echo "Success: Connection to the database established!";
    if(isset($_POST['title']) AND isset($_POST['desc'])){
        
        $unique_Id = $_SESSION['UNIQUE_ID'];
        $sql = "SELECT * FROM `logintable`.`reg` WHERE  UNIQUE_ID = '{$_SESSION['UNIQUE_ID']}'";
        $sql1 = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($sql1);

        $title = $_POST['title'];
        $desc = mysqli_real_escape_string($con,$_POST['desc']);
        $summary = mysqli_real_escape_string($con,$_POST['summary']);

        $filename = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname,$folder);
        $G_ID = $row["Sno"];
        $name = $row['Name'];

        $sql = "INSERT INTO recipes (Name,title, description, img, Summary ,G_ID) VALUES ('$name','$title', '$desc','$folder','$summary','$G_ID')";
        
        if($con->query($sql) == true){
        // echo "Successfully Inserted";
        
        }
        $insert = false;
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
    <link rel="stylesheet" href="css/recipe.css">
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

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+O5KRHzf3D2JECJKJFU2L1Z9SM3p3LlAWVjE8fIZ1r3ZCqF5zVIoj8YLhE" crossorigin="anonymous"></script>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action ="" method = "POST">
        <div class="mb-3">
            <label  class="form-label" for= "title">Recipe Name</label>
            <input type="text" class="form-control" id="titleEdit" name = "titleEdit">
            
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Instructions</label>
        <textarea class="form-control" id="descEdit" name ="descEdit"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href=""> <span><img src="images/chef-hat.ico" alt=""> FlavorForge</span></a>
            <ul class="navbar-nav ms-lg-auto pe-xxl-3 ">
                <li class="nav-item px-2  ">
                    <a class="nav-link active " href="index.php">Home</a>
                </li>
                <li class="nav-item px-2 active1">
                    <a class="nav-link active li" href="">Recipes</a>
                </li>
                <li class="nav-item  px-2 ">
                    <a class="nav-link active" href="contact1.php">Contact Us</a>
                </li>
                <li class="nav-item  px-2">
                    <a class="nav-link active" href="index1.php"  id ="sign"><i >Sign Up</i></a>
                </li>
                <li class="nav-item btn-shadow px-2 ms-3">
                    <a class="nav-link active" href="index1.php" >Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php 
        if(!$insert){
                    echo"<div class='alert alert-secondary bg-sucess' role='alert'>
                        Recipe added Successfully!!
                    </div>";
                    echo"<style>.alert{margin-bottom:0;}</style>";
                    echo"<style>.container{bottom:30px;}</style>";
            }
    ?>        

    <div class="container my-3">
        <h2>Add a recipe</h2>
        <form action ="" method = "POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label  class="form-label" for= "title">Recipe Name</label>
            <input type="text" class="form-control" id="title" name = "title">
        </div>
        <div class="mb-3">
           Recipe Images <br>
            <input type="file" class="form-control" name = "img">
        </div>
        <div class="mb-3">
             Recipe Description <br>
            <textarea name="summary" class="form-control summ" ></textarea>
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Instructions</label>
        <textarea class="form-control inst" id="desc" name ="desc"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>