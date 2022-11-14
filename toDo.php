<?php

include "connect.php";


if(isset($_POST['submit'])) {
  $name = $_POST['naam']; 
  $beschrijving = $_POST['beschrijving'];
  $tijdstuur = $_POST['tijdsduur']; 
  $status = $_POST['status']; 


  $sql= "insert into 'todolist' (naam, beschrijving, tijdsduur, status) values('$naam', '$beschrijving', '$tijdsduur', '$status')";
  $result = mysqli_query($con, $quer);

    if($result) {
      echo "Data has been succesfully inserted ";
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
        <label for="name" class="form-label">Naam</label>
        <input name="naam" type="text" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="beschrijving" class="form-label">Beschrijving</label>
        <input name="beschrijving" type="text" class="form-control" id="beschrijving">
    </div>
    <div class="mb-3">
        <label for="tijdsduur" class="form-label">Tijdsduur</label>
        <input name="tijdsduur" type="text" class="form-control" id="tijdsduur">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input name="status" type="text" class="form-control" id="status">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
