<?php

$con = new mysqli("localhost", "root", "", "todolist");

if($con) {
    echo "Conntection succesfull ";
} else {
    die(mysqli_error($con));
}

?>