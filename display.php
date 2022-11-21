<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Startpagina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="stylesheet.css" rel="stylesheet">
  </head>
  <body>

  <div class="contaier">
    <button class="btn btn-primary ">
    <a href="toDo.php" class="text-light text-decoration-none">Een ToDo toevoegen</a>
    </button>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Naam</th>
      <th scope="col">Beschrijving</th>
      <th scope="col">Tijdsduur in minuten</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php 

    include 'connect.php';
    
    $sql = "SELECT * FROM `todolist` ";
    $result = mysqli_query($con, $sql);

    if($result) {
       while($row = mysqli_fetch_assoc($result)) {
        echo '
        <tr>
        <td scope="row">'.$row["Id"].'</td>
        <td scope="row">'.$row["naam"].'</td>
        <td scope="row">'.$row["beschrijving"].'</td>
        <td scope="row">'.$row["tijdsduur"].'</td>
        <td scope="row">'.$row["status"].'</td>
        <td scope="row">
          <button class="btn btn-warning">
            <a href="update.php?updateid='.$row["Id"].'" class="text-light text-decoration-none">wijzigen</a>
          </button> &nbsp; 
          <button class="btn btn-danger">
            <a href="delete.php?deleteid='.$row["Id"].'" class="text-light text-decoration-none">verwijderen</a>
          </button>
        </td>
      </tr>';
       }; 
    }
    ?>
    <tr>
  </tbody>
</table>

  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
