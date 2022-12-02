<?php

include "connect.php";

if(isset($_POST['submit'])) {
  $listName = $_POST['naam']; 

  $sql= "create table $listName (id INT NOT NULL AUTO_INCREMENT, 
                                naam VARCHAR(20), 
                                beschrijving VARCHAR(50), 
                                tijdsduur INT(50), 
                                status VARCHAR(30),  
                                PRIMARY KEY(id)
                              )";

                              
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:list.php');
  } else {
    die(mysqli_error($con));
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List aanmaken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  
  <div class="container my-5">
    <form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Geeft een bijpassende naam aan je lijst</label>
        <input name="naam" type="text" class="form-control my-3" id="name" placeholder="voer een naam in" autocomplete="off">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Toevoegen</button>
    </form>

    <table class="table table-striped my-5">
    <thead>
      <tr>
        <th scope="col">Nummer</th>
        <th scope="col">lijst</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php 
      // GETTING THE DATABASE CONNECTION
      include 'connect.php';
      
      // SELECTING ALL THE TABLES FROM THE DATABASE

      $db = "todolist";
      $tables = mysqli_query($con, "SHOW TABLES FROM $db");
    
      // DISPLAY THE NUMBER OF TABLES IN THE DATABASE

      $totalTables = mysqli_num_rows($tables);
      
    while($fech = mysqli_fetch_assoc($tables)) {
        $arryToString = implode(",", $fech);
        echo '
        <tr>
        <td scope="row">'.$totalTables.'</td>
        <td scope="row">'.$arryToString.'</td>
        <td scope="row">
            <button class="btn btn-primary"><a href="bekijkList.php?tableName='.$arryToString.'" class="text-light text-decoration-none">Bekijken</a></button>
            <button class="btn btn-warning ms-5"><a href="updateList.php?tableName='.$arryToString.'" class="text-light text-decoration-none">Wijzigen</a></button>
            <button class="btn btn-danger ms-5"><a href="deleteList.php?tableName='.$arryToString.'" class="text-light text-decoration-none">Verwijderen</a></button>
        </td>
      </tr>';
        }; 
      ?>
      <tr>
    </tbody>
  </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
