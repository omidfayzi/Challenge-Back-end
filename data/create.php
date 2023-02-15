<?php
include "../connection/connect.php";

$listName = $_GET['listName'];
$list_ID = $_GET['list_ID'];

if(isset($_POST['submit'])) {
      $naam = $_POST['naam']; 
      $beschrijving = $_POST['beschrijving'];
      $tijdsduur = $_POST['tijdsduur']; 
      $status = $_POST['status'];

      // CREATING THE SQL QUERY TEMPLATE
      $sql= "insert into items (naam, beschrijving, tijdsduur, status, list_ID) values(?,?,?,?,?)";

      // PREPARING THE STATEMENT
      // STMT = STATEMENT
      // INIT = INITIAL 

      $stmt = mysqli_stmt_init($con);

      // CHECKING FOR ANY ERROR'S 
      // 1 PARAMETER : THE STATEMENT
      // 2 PARAMETER : THE SQL QUERY TEMPLATE

      if(mysqli_stmt_prepare($stmt, $sql)) {
        // BINDING THE PARAMETERS TO THE STATEMENT
        // 1 PARAMETER : THE STATEMENT
        // 2 PARAMETER : INDICATOR FOR THE NUMBER OF PARAMETERS 
        // 3 VARIABLE : TO REPLACE WITH

        mysqli_stmt_bind_param($stmt, 'sssss', $naam, $beschrijving, $tijdsduur, $status, $list_ID);

        // EXECUTING THE STATEMENT 

        mysqli_stmt_execute($stmt);
        header('Location:../list/readList.php?list_ID='.$list_ID.'');

      } else {
        die(mysqli_error($con));
      }
}

?>