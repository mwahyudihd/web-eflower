<?php 
include 'data-connect.php';
session_start();
$id_selected = $_POST['id_user'];
$status_selected = $_POST['stat'];
$role_selected = $_POST['role'];

if($role_selected != NULL){
    $query = mysqli_query($connection,"UPDATE users SET role = '$role_selected' WHERE id_user = '$id_selected'");
    if($query){
        header("location: ../admin/admin-users.php?success");
    }else{
        echo mysqli_error($connection);
    }
}else{
    $query = mysqli_query($connection,"UPDATE users SET status_user = '$status_selected' WHERE id_user = '$id_selected'");
    if($query){
        header("location: ../admin/admin-users.php?success");
    }else{
        echo mysqli_error($connection);
    }
}
?>