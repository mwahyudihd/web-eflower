<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
echo "File ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " telah diupload.";
} else {
echo "Maaf, terjadi kesalahan saat mengupload file Anda.";
}
?>