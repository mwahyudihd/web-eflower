<?php
session_start();

include 'data-connect.php';

//get database
$usermail = $_POST['user_mail'];
$password = $_POST['password'];

//encryption password
$end_pw = md5($password);

//validation login
$getQuery = mysqli_query($connection, "SELECT * FROM users WHERE user_mail = '$usermail' AND password = '$end_pw'");

$jml_data = mysqli_num_rows($getQuery);
if ($jml_data > 0) {
    $res = mysqli_fetch_array($getQuery);
    $_SESSION["user_mail"] = $usermail;
    $_SESSION["nama"] = $res['nama_user'];
    $_SESSION["nama_lengkap"] = $res['nama_lengkap'];
    $_SESSION["id"] = $res['id_user'];
    $_SESSION["role"] = $res['role'];
    $_SESSION["no-rek"] = $res['no_rek'];
    $_SESSION["no-telp"] = $res['no_telp'];

    if ($_SESSION["role"] == 'admin') {
        header("location: ../admin?admin");
    } else if ($_SESSION["role"] == 'user') {
        header("location: ../index.php");
    }
} else {
    header("location: ../form.php?pesan");
}

?>