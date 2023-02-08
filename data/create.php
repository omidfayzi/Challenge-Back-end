<?php
include "../connection/connect.php";

$list_ID = $_GET['list_ID'];
$listName = $_GET['listName'];

if(isset($_POST['submit'])) {
  $naam = $_POST['naam']; 
  $beschrijving = $_POST['beschrijving'];
  $tijdsduur = $_POST['tijdsduur']; 
  $status = $_POST['status'];

  $sql= "insert into items (naam, beschrijving, tijdsduur, status, list_ID) values('$naam', '$beschrijving', '$tijdsduur', '$status', '$list_ID')";
  $result = mysqli_query($con, $sql);

  if($result) {
    header('Location:../list/readList.php?list_ID='.$list_ID.'');
  } else {
    die(mysqli_error($con));
  }
}

?>