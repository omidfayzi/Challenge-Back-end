<?php

include "../connection/connect.php";

$list_ID = $_GET['list_ID'];
$listName = $_GET['listName'];

if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 
  
  $sql= "update list set naam='$naam' WHERE id='$list_ID'";
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:../list/readList.php');
  } else {
    die(mysqli_error($con));
  }

}

?>
