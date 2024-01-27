<?php
session_start();
if ($_SESSION["role"] == 'admin') {
    header("location: ../admin");
} else if ($_SESSION["role"] == 'user') {
    header("location: ../index.php");
}
?>