<?php

include "../connection/connect.php";

$updateid = $_GET['updateid'];
$listName = $_GET['listName'];

if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 
  $beschrijving = $_POST['beschrijving'];
  $tijdsduur = $_POST['tijdsduur']; 
  $status = $_POST['status']; 

  $sql= "update items set id=$updateid, naam='$naam', beschrijving='$beschrijving', tijdsduur=$tijdsduur, status='$status' where id=$updateid";
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:../list/readList.php?');
  } else {
    die(mysqli_error($con));
  }

}
?>