<?php
    include "../connection/connect.php";

    $deleteid = $_GET['deleteid'];

    $sql = "delete from items WHERE id=$deleteid";
    $result = mysqli_query($con, $sql);
       
    if($result) {
        header('location: ../list/readList.php?');
    } else {
        die(mysqli_error($con));
    }
    
?>