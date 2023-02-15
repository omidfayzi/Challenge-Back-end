<?php

include "../connection/connect.php";

if(isset($_POST['submit'])) {
  $listName = $_POST['naam']; 

    // CREATING THE SQL QUERY TEMPLATE
    $sql= "insert into list (naam) values(?)";

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
      // 2 PARAMETER : INDICATOR FOR THE NUMBER OF THE PARAMETERS
      // 3 VARIABLE : TO REPLACE WITH

      mysqli_stmt_bind_param($stmt, "s", $listName);

      // EXECUTING THE STATEMENT

      mysqli_stmt_execute($stmt);
      header('Location:readList.php');

    } else {
      die(mysqli_error($con));
    }
}
?>
