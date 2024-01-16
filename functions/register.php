<?php
include 'data-connect.php';
//id
$id_generate = bin2hex(random_bytes(4));
$id_generate = strtoupper($id_generate);

//nama_user
$nm_lengkap = $_POST['nama'];

//email
$mail = $_POST['email'];

//nomor telpon
$no_telp = $_POST['no-telp'];

//rekening
$no_rek = $_POST['no-rek'];

$address = $_POST['address-data'];


//password
$password = $_POST['passReg'];
//encrypt password
$end_pw = md5($password);

$setquery = mysqli_query($connection, "INSERT INTO users VALUES ('$id_generate', null, '$end_pw', 'user', '$mail', null, '$no_telp', '$nm_lengkap', '$address', '$no_rek')");

header ("location: ../form.php?new-login");
?>