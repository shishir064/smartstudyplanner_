<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "smartstudy";

    $conn = mysqli_connect($server,$username,$password,$db_name);
    if (!$conn){
        die("something is wrong");
    }
?>