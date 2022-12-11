<?php
    include "../connection/connect.php";

    if(isset($_GET['tableName'])) {

        $id = $_GET['tableName'];

        $sql = "DROP TABLE $id;";
        $result = mysqli_query($con, $sql);

        if($result) {
            header("location: ../list/createList.php");
        } else {
            die(mysqli_error($con));
        }

    }
?>