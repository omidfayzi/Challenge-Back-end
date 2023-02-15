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
          $filterStatus = 'filterStatus'; 
            
        echo '
            <div class="container-lg">
              <div class="filterContainer">
              <form method="get">
                    <label>sorteren op</label>
                    <select id="filter" name="'.$filterStatus.'">
            ';

            if(isset($_GET['filterStatus'])) {
              $firstFilter = $_GET['filterStatus'];

              if($firstFilter == "geen" || $firstFilter == "tijdsduur aflopend" || $firstFilter == "tijdsduur oplopend") {
                echo '
                    <option selected value="geen">Geen filter</option> 
                    <option value="voldaan">voldaan</option>
                    <option value="NIET voldaan">NIET voldaan</option>
                ';
              } elseif ($firstFilter == "voldaan") {
                  echo '
                      <option value="geen">Geen filter</option> 
                      <option selected value="voldaan">voldaan</option>
                      <option value="NIET voldaan">NIET voldaan</option>
                  ';
              } elseif ($firstFilter == "NIET voldaan") {
                echo '
                    <option value="geen">Geen filter</option> 
                    <option value="voldaan">voldaan</option>
                    <option selected value="NIET voldaan">NIET voldaan</option>
                ';
            } 
          } else {
              echo '
              <option selected value="geen">Geen filter</option> 
              <option value="voldaan">voldaan</option>
              <option value="NIET voldaan">NIET voldaan</option>
        ';
          }
          
          echo '
              </select>
                    <button name="submit" type="submit" class="btn btn-primary" value="'.$list_ID.'">filter</button>
              </form>
              <form method="get">
                    <label>sorteren op</label>
                    <select id="filter" name="'.$filterStatus.'">
          ';

          if(isset($_GET['filterStatus'])) {
            $secondFilter = $_GET['filterStatus'];

            if($secondFilter == "geen" || $secondFilter == "voldaan" || $secondFilter == "NIET voldaan") {
              echo '
                <option selected value="geen">Geen filter</option>
                <option value="tijdsduur aflopend">tijdsduur aflopend</option>
                <option value="tijdsduur oplopend">tijdsduur oplopend</option>
              ';
            } elseif ($secondFilter == "tijdsduur aflopend") {
                echo '
                  <option value="geen">Geen filter</option>
                  <option selected value="tijdsduur aflopend">tijdsduur aflopend</option>
                  <option value="tijdsduur oplopend">tijdsduur oplopend</option>
                ';
            } elseif ($secondFilter == "tijdsduur oplopend") {
              echo '
                  <option value="geen">Geen filter</option>
                  <option value="tijdsduur aflopend">tijdsduur aflopend</option>
                  <option selected value="tijdsduur oplopend">tijdsduur oplopend</option>
              ';
          }
        } else {
          echo '
             <option selected value="geen">Geen filter</option>
             <option value="tijdsduur aflopend">tijdsduur aflopend</option>
             <option value="tijdsduur oplopend">tijdsduur oplopend</option>
           ';
        }
        
        echo '                
                    </select>
                    <button name="submit" type="submit" class="btn btn-primary" value="'.$list_ID.'">filter</button>
            </form>
            </div>
            <div class="container-md">
            <div class="container-s">
                <div>
                    <p>'.$listName .'</p>
                    <p>'.$list_ID .'</p>
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
                      $buttonValue = $_GET['submit'];


                      
                      if($filterStauts == 'NIET voldaan' && $list_ID == $buttonValue) {
                        $secondSql = "select * from items where list_ID=$list_ID AND status='NIET voldaan'";
                      } elseif ($filterStauts == 'voldaan' && $list_ID == $buttonValue) {
                        $secondSql = "select * from items where list_ID=$list_ID AND status='voldaan'";
                      } elseif ($filterStauts == 'tijdsduur aflopend' && $list_ID == $buttonValue) {
                        $secondSql = "select * from items where list_ID=$list_ID order by tijdsduur";
                      } elseif ($filterStauts == 'tijdsduur oplopend' && $list_ID == $buttonValue) {
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