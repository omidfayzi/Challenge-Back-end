<?php

include "connect.php";


if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 
  $beschrijving = $_POST['beschrijving'];
  $tijdsduur = $_POST['tijdsduur']; 
  $status = $_POST['status'];

  $sql= "insert into `todolist` (naam, beschrijving, tijdsduur, status) values('$naam', '$beschrijving', '$tijdsduur', '$status')";
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:display.php');
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
    <title>ToDo toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  
  <div class="container my-5">
    <form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Naam</label>
        <input name="naam" type="text" class="form-control" id="name" placeholder="voer een naam toe" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="beschrijving" class="form-label">Beschrijving</label>
        <input name="beschrijving" type="text" class="form-control" id="beschrijving" placeholder="voer een beschrijving toe" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="tijdsduur" class="form-label">Tijdsduur in minuten</label>
        <input name="tijdsduur" type="number" class="form-control" id="tijdsduur" placeholder="voer de tijduur in minuten" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input name="status" type="text" class="form-control" id="status" value="NIET voldaan">
        <input name="statusMark" type="checkbox" id="statusMark" autocomplete="off" disabled="disabled">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
