<?php

$con = new mysqli("localhost", "root", "", "todolist");

if(!$con) {
    die(mysqli_error($con));
}

?>