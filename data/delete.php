<?php
    include '/Connection/connect.php';

    if(isset($_GET['deleteid'])) {

        $tableName = $_GET['tableName']
        $deleteid = $_GET['deleteid'];

        $sql = "delete from  $tableName WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if($result) {
            header("location: ../data/read.php");
        } else {
            die(mysqli_error($con));
        }

    }
?>