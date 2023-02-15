<?php

if(isset($_GET['listName'])) {
    
    $sql = "select * from items where id=$updateid";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result)) {
      $filterStatus = $row['status']; 
      
      if($filterStatus == 'NIET voldaan') {
        echo '
        <option selected value="NIET voldaan">NIET voldaan</option> 
        <option value="voldaan">voldaan</option>
        ';
        } else {
        echo '
        <option value="NIET voldaan">NIET voldaan</option> 
        <option selected value="voldaan">voldaan</option>
        ';
        };
    }
  }
?>