<?php
    include "../connection/connect.php";

    $deleteid = $_GET['deleteid'];
    $tableName = $_GET['tableName'];

    $sql = "delete from  $tableName WHERE id=$deleteid";
    $result = mysqli_query($con, $sql);
       
    if($result) {
        header('location: ../list/createList.php?tableName='.$tableName.'');
    } else {
        die(mysqli_error($con));
    }
    
?>