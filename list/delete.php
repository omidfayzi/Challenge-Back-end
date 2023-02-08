<?php
    include "../connection/connect.php";

    if(isset($_GET['list_ID'])) {

        $list_ID = $_GET['list_ID'];

        $sql = "delete from list WHERE id='$list_ID'";
        $result = mysqli_query($con, $sql);

        if($result) {
            $sql = "delete from items WHERE list_ID='$list_ID'";
            $result = mysqli_query($con, $sql);

            header("location: ../list/readList.php");
        } else {
            die(mysqli_error($con));
        }

    }
?>