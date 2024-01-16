<?php
include 'data-connect.php';
session_start();

$id_users = $_SESSION['id'];

$nama_update = $_POST['nama-lkp'];
$mail_update = $_POST['email'];
$telp_num = $_POST['contact'];
$rekening = $_POST['no-rkng'];




$query = mysqli_query($connection, "UPDATE users SET nama_lengkap = '$nama_update', user_mail = '$mail_update', no_telp = '$telp_num', no_rek = '$rekening' WHERE id_user = '$id_users'");
header("location: ../profile.php?success");
?>