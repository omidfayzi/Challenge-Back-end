<?php

include "../connection/connect.php";

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
    header('Location:createList.php');
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
    <link href="../style/stylesheet.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <div class="container my-5">
    <form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Geeft een bijpassende naam aan je lijst</label>
        <input name="naam" type="text" class="form-control my-3" id="name" placeholder="voer een naam in" autocomplete="off" required>
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
    <?php 
      // GETTING THE DATABASE CONNECTION
      include "../connection/connect.php";
      
      // SELECTING ALL THE TABLES FROM THE DATABASE

      $db = "todolist";
      $tables = mysqli_query($con, "SHOW TABLES FROM $db");
    
      // DISPLAY THE NUMBER OF TABLES IN THE DATABASE

      $totalTables = mysqli_num_rows($tables);
      $counter = 0;
      
    while($fech = mysqli_fetch_assoc($tables)) {
        $tableName = implode(",", $fech);
        $str = strval($counter);
        $filterStatus = $str . 'filterStatus';

        echo '
          <div class="container-lg">
            <div class="filterContainer">
              <form method="get">
                <label>sorteren op</label>
                <select id="filter" name="'.$filterStatus.'"">
                  <option value="SELECTEER">--SELECTEER--</option>
                  <option value="voldaan">voldaan</option>
                  <option value="NIET voldaan">NIET voldaan</option>
                  <option value="tijdsduur aflopend">tijdsduur aflopend</option>
                  <option value="tijdsduur oplopend">tijdsduur oplopend</option>
                </select>
                <button name="submit"  type="submit" class="btn btn-primary">filter</button>
              </form>
            </div>
            <div class="container-md">
                <div class="container-s">
                    <div>
                        <p>'.$counter.'</p>
                        <p>'.$tableName.'</p>
                    </div>
                    <div class="button-container">
                        <button class="btn btn-primary"><a class="text-light text-decoration-none" href="../data/create.php?tableName='.$tableName.'">Toevoegen</a></button>
                        <button class="btn btn-warning ms-5"><a href="updateList.php?tableName='.$tableName.'" class="text-light text-decoration-none">Wijzigen</a></button>
                        <button class="btn btn-danger ms-5"><a href="deleteList.php?tableName='.$tableName.'" class="text-light text-decoration-none">Verwijderen</a></button>
                    </div>
                </div>

                <table class="table table-hover my-5">
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
                  ';

                  $sql = "select * from $tableName"; 

                  if (isset($_GET[$filterStatus])) {
                    $filterStauts = $_GET[$filterStatus];
                    
                    if($filterStauts == 'NIET voldaan') {
                      $sql = "select * from $tableName where status='NIET voldaan'";
                    } elseif ($filterStauts == 'voldaan') {
                      $sql = "select * from $tableName where status='voldaan'";
                    } elseif ($filterStauts == 'tijdsduur aflopend') {
                      $sql = "select * from $tableName order by tijdsduur";
                    } else {
                      $sql = "select * from $tableName order by tijdsduur desc";
                    }
                  } 
                  
                  $result = mysqli_query($con, $sql);

                  while($row = mysqli_fetch_assoc($result)) {
          
                    $id = $row['id'];
                    $naam = $row['naam'];
                    $beschrijving = $row['beschrijving'];
                    $tijdsduur = $row['tijdsduur'];
                    $status = $row['status']; 

                    echo '
                    <tbody>
                        <tr>
                        <td scope="row">'.$id.'</td>
                        <td scope="row">'.$naam.'</td>
                        <td scope="row">'.$beschrijving.'</td>
                        <td scope="row">'.$tijdsduur.'</td>
                        <td scope="row">'.$status.'</td>
                        <td scope="row">
                          <button class="btn btn-warning ms-5"><a href="../data/update.php?updateid='.$id.'&tableName='.$tableName.'" class="text-light text-decoration-none">Wijzigen</a></button>
                          <button class="btn btn-danger ms-5"><a href="../data/delete.php?deleteid='.$id.'&tableName='.$tableName.'" class="text-light text-decoration-none">Verwijderen</a></button>
                        </td>
                        </tr>
                    </tbody>
                      ';
                  }

            echo '
            </table>
                </div>
              </div>
            ';
                
        $counter = ($counter + 1); 
        }
      ?>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
