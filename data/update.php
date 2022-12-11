<?php

include "connect.php";

$tableName = $_GET['tableName']
$updateId = $_GET['updateid'];

if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 
  $beschrijving = $_POST['beschrijving'];
  $tijdsduur = $_POST['tijdsduur']; 
  $status = $_POST['status']; 

  $sql= "update $tableName set id=$updateId, naam='$naam', beschrijving='$beschrijving', tijdsduur=$tijdsduur, status='$status' where id=$updateId";
  $result = mysqli_query($con, $sql);


}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo updaten</title>
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
        <label for="tijdsduur" class="form-label">Tijdsduur</label>
        <input name="tijdsduur" type="text" class="form-control" id="tijdsduur" placeholder="voer de tijdduur in minuten" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input name="statusMark" type="checkbox" id="statusMark" autocomplete="off">
        <input name="status" type="text" id="status" placeholder="" autocomplete="off" value="niet voldaan">
    </div>
    <button name="submit" type="submit" class="btn btn-warning">Wijzigen</button>
    </form>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
