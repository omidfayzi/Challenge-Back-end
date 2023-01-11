<?php

include "../connection/connect.php";

$updateid = $_GET['updateid'];
$tableName = $_GET['tableName'];

if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 
  $beschrijving = $_POST['beschrijving'];
  $tijdsduur = $_POST['tijdsduur']; 
  $status = $_POST['status']; 

  $sql= "update $tableName set id=$updateid, naam='$naam', beschrijving='$beschrijving', tijdsduur=$tijdsduur, status='$status' where id=$updateid";
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:../list/createList.php?tableName='.$tableName.'');
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
    <title>ToDo updaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

<div class="container my-5">
        <form method="post">

        <?PHP
  
  if(isset($_GET['tableName'])) {
    
    $sql = "select * from $tableName where id=$updateid";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result)) {
          
      $id = $row['id'];
      $naam = $row['naam'];
      $beschrijving = $row['beschrijving'];
      $tijdsduur = $row['tijdsduur'];
      $status = $row['status']; 

      echo '<div class="mb-3">';
        echo '<label for="name" class="form-label">Naam</label>';
        echo '<input name="naam" value="'.$naam.'" type="text" class="form-control" id="name" placeholder="vul een naam toe" autocomplete="off" required>';
      echo '</div>';

      echo '<div class="mb-3">';
      echo '<label for="beschrijving" class="form-label">Beschrijving</label>';
      echo '<input name="beschrijving" value="'.$beschrijving.'" type="text" class="form-control" id="beschrijving" placeholder="vul een beschrijving toe" autocomplete="off" required>';
      echo '</div>';

      echo '<div class="mb-3">';
      echo '<label for="tijdsduur" class="form-label">Tijdsduur</label>';
      echo '<input name="tijdsduur" value="'.$tijdsduur.'" type="text" class="form-control" id="tijdsduur" placeholder="vul de tijdduur in minuten" autocomplete="off" required>';
      echo '</div>';
    }
  }
  
  ?>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status">
                <option value="'NIET voldaan">NIET voldaan</option>
                <option value="voldaan">voldaan</option>
            </select>
        </div>
        <button name="submit" type="submit" class="btn btn-warning">Wijzigen</button>
        </form>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../style/script.js"></script>
  </body>
</html>
