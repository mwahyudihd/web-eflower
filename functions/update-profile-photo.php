<?php
include 'data-connect.php';
session_start();

$targetDir = "assets/img/profile/";
$fileName = basename($_FILES['up-image']["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = $_FILES['up-image']['type'];
$file_size = $_FILES['up-image']['size'];
$id_user = $_SESSION['id'];

$query = "UPDATE users SET foto  = '$targetFilePath' WHERE id_user = '$id_user' ";
if($query){
    move_uploaded_file($_FILES['up-image']["tmp_name"], $targetFilePath);
    mysqli_query($connection, $query);
    echo "File berhasil diunggah dan path file berhasil disimpan ke database.";
}else{
    echo 'ERROR : '.mysqli_error($connection);
}


echo "<br><meta http-equiv='refresh' content='5; URL=../profile.php'> You will be redirected to the form in 5 seconds";
?>