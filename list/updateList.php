<?php

include "../connection/connect.php";

$tableName = $_GET['tableName'];

if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 

  $sql= "rename table $tableName to $naam";
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:../list/createList.php');
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
    <title>ToDo lijst updaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  
  <div class="container my-5">
    <form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Lijst naam</label>
        <input name="naam" type="text" class="form-control" id="name" placeholder="Vul een nieuwe lijst naam in" autocomplete="off">
    </div>
    <button name="submit" type="submit" class="btn btn-warning">Wijzigen</button>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
