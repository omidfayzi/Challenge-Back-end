<?php

include "../connection/connect.php";

if(isset($_POST['submit'])) {
  $listName = $_POST['naam']; 

  $sql= "insert into list (naam) values('$listName')";
              
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:readList.php');
  } else {
    die(mysqli_error($con));
  }
}

?>

