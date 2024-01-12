<?php

$user = "root";
$database = "db_eflower";
$pass = "";
$server = "localhost";

$connection = mysqli_connect($server, $user, $pass, $database);
if (!$connection) {
    die('Gagal Terkoneksi! : ' . mysqli_connect_error());
}

?>