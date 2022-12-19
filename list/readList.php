<?php
      include "../connection/connect.php";
      $tableName = $_GET['tableName'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List aanmaken</title>
    <link href="../style/stylesheet.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  <div class="container" id="dataContainer">
    <p>soorteren</p>
    <form method="post" id="data">
      <select name="data" id="formData" onchange="this.form.submit();">
          <option selected value="sorteren">NIET voldaan</option>
          <option value="sorteren">sorteren op</option>
          <option value="sorteren">tijdsduur</option>
          <option value="sorteren">voldaan</option>
      </select>
    </form>
  </div>
  
  <div class="container my-5">
    <?php 
      echo '<button name="submit" type="submit" class="btn btn-primary"><a class="text-light text-decoration-none" href="../data/create.php?tableName='.$tableName.'">todo toevoegen</a></button>';
    ?>
    </form>

    <table class="table table-striped my-5">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">naam</th>
        <th scope="col">beschrijving</th>
        <th scope="col">tijdsduur</th>
        <th scope="col">status</th>
        <th scope="col">functies</th>
      </tr>
    </thead>

    <tbody>
      <?php

          if(isset($_GET['tableName'])) {
            
            $sql = "select * from $tableName";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)) {
              
              $id = $row['id'];
              $naam = $row['naam'];
              $beschrijving = $row['beschrijving'];
              $tijdsduur = $row['tijdsduur'];
              $status = $row['status'];
               
              echo '
                  <tr>
                  <td scope="row">'.$id.'</td>
                  <td scope="row">'.$naam.'</td>
                  <td scope="row">'.$beschrijving.'</td>
                  <td scope="row">'.$tijdsduur.'</td>
                  <td scope="row" id="status">'.$status.'</td>
                  <td scope="row">
                      <button class="btn btn-warning ms-5"><a href="../data/update.php?updateid='.$id.'&tableName='.$tableName.'" class="text-light text-decoration-none">Wijzigen</a></button>
                      <button class="btn btn-danger ms-5"><a href="../data/delete.php?deleteid='.$id.'&tableName='.$tableName.'" class="text-light text-decoration-none">Verwijderen</a></button>
                  </td>
                  </tr>
                ';

            }; 
            }
            
      ?>
      <tr>
    </tbody>
  </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
