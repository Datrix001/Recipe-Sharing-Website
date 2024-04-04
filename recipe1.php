<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="container">
        

        <!-- tables -->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = "SELECT * FROM `recipes`";
        $result = mysqli_query($con, $sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sno = $sno +1;
            echo "<tr>
                    <th>".$sno."</th>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td><button class='btn btn-sm btn-primary edit'>Edit</button> <a href='/del'>Delete</a></td>
                </tr>";
        }
        ?>
  </tbody> 
</table>
    </div>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit ", );
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, description);
                descEdit.value = desc;
                titleEdit.value = title;
                $('#editModal').modal('show');
        
            })
        })
    </script>
</body>
</html>