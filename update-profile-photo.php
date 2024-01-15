<?php
include 'data-connect.php';
session_start();


function uploadFileAndSavePathToDatabase($imageName, $connection)
{
    $targetDir = "assets/img/profile/";
    $fileName = basename($_FILES[$imageName]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = $_FILES[$imageName]['type'];
    $file_size = $_FILES[$imageName]['size'];
    $id_user = $_SESSION['id'];

    // Periksa apakah file adalah gambar .jpg atau .png
    if ($fileType == "image/JPG" || $fileType == "image/png") {
        if($file_size <= 10000000){ 
            if (move_uploaded_file($_FILES[$imageName]["tmp_name"], $targetFilePath)) {
                // Simpan path file ke database
                $query = "UPDATE users SET foto  = '$targetFilePath' WHERE id_user = '$id_user' ";
                if (mysqli_query($connection, $query)) {
                    echo "File berhasil diunggah dan path file berhasil disimpan ke database.";
                } else {
                    echo "Terjadi kesalahan saat menyimpan path file ke database.";
                }
            } else {
                echo "Terjadi kesalahan saat mengunggah file Anda.";
            }
        }else{
            echo "Maaf, Ukuran file tidak lebih dari 1mb";
        }
    } else {
        echo "Hanya file .jpg dan .png yang diperbolehkan.";
    }
}

uploadFileAndSavePathToDatabase('up-image', $connection);
echo "<br><meta http-equiv='refresh' content='5; URL=profile.php'> You will be redirected to the form in 5 seconds";
?>