<?php
  if(isset($_GET['listName'])) {
    
    $sql = "select * from items where id=$updateid";
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