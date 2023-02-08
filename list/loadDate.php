<?php 
          // GETTING THE DATABASE CONNECTION
          include "../connection/connect.php";

          // SELECTING THE LIST FROM THE DATABASE
          $sql = "select * from list";
          $result = mysqli_query($con, $sql);

          while($list = mysqli_fetch_assoc($result)) {
          $list_ID = $list['id'];
          $listName = $list['naam'];

          // FILTER STAUTS
          $filterStatus = 'LEEG'; 
            
        echo '
            <div class="container-lg">
              <div class="filterContainer">
              <form method="get">
                    <label>sorteren op</label>
                    <select id="filter" name="'.$filterStatus.'">
                      <option value="SELECTEER">Geen filter</option>
                      <option value="voldaan">voldaan</option>
                      <option value="NIET voldaan">NIET voldaan</option>
                    </select>
                    <button name="submit" type="submit" class="btn btn-primary">filter</button>
              </form>
              <form method="get">
                    <label>sorteren op</label>
                    <select id="filter" name="'.$filterStatus.'">
                      <option value="SELECTEER">tijdsduur</option>
                      <option value="tijdsduur aflopend">tijdsduur aflopend</option>
                      <option value="tijdsduur oplopend">tijdsduur oplopend</option>
                    </select>
                    <button name="submit" type="submit" class="btn btn-primary">filter</button>
            </form>
            </div>
            <div class="container-md">
            <div class="container-s">
                <div>
                    <p>'.$listName .'</p>
                </div>
                <div class="button-container">
                    <button class="btn btn-primary"><a class="text-light text-decoration-none" href="../data/createDocument.php?list_ID='.$list_ID.'&listName='.$listName.'">Toevoegen</a></button>
                    <button class="btn btn-warning ms-5"><a href="updateList.php?list_ID='.$list_ID.'&listName='.$listName.'" class="text-light text-decoration-none">Wijzigen</a></button>
                    <button class="btn btn-danger ms-5"><a href="delete.php?list_ID='.$list_ID.'&listName='.$listName.'" class="text-light text-decoration-none">Verwijderen</a></button>
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

                $secondSql = "select * from items where list_ID=$list_ID";

                    if (isset($_GET[$filterStatus])) {
                      $filterStauts = $_GET[$filterStatus];
                      
                      if($filterStauts == 'NIET voldaan') {
                        $secondSql = "select * from items where list_ID=$list_ID AND status='NIET voldaan'";
                      } elseif ($filterStauts == 'voldaan') {
                        $secondSql = "select * from items where list_ID=$list_ID AND status='voldaan'";
                      } elseif ($filterStauts == 'tijdsduur aflopend') {
                        $secondSql = "select * from items where list_ID=$list_ID order by tijdsduur";
                      } else {
                        $secondSql = "select * from items where list_ID=$list_ID order by tijdsduur desc";
                      }
                    } 
                
                $secondResult = mysqli_query($con, $secondSql);
    
              while($list = mysqli_fetch_assoc($secondResult)) {
                $id = $list['id'];
                $naam = $list['naam'];
                $beschrijving = $list['beschrijving'];
                $tijdsduur = $list['tijdsduur'];
                $status = $list['status'];


                echo '
                <tbody>
                    <tr>
                    <td scope="row">'.$id.'</td>
                    <td scope="row">'.$naam.'</td>
                    <td scope="row">'.$beschrijving.'</td>
                    <td scope="row">'.$tijdsduur.'</td>
                    <td scope="row">'.$status.'</td>
                    <td scope="row">
                      <button class="btn btn-warning ms-5"><a href="../data/updateDocument.php?updateid='.$id.'&listName='.$listName.'" class="text-light text-decoration-none">Wijzigen</a></button>
                      <button class="btn btn-danger ms-5"><a href="../data/delete.php?deleteid='.$id.'&listName='.$listName.'" class="text-light text-decoration-none">Verwijderen</a></button>
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
        }
  ?>