function logOut() {
    var confirmLogout = confirm("Apakah Anda ingin keluar?");

    if (confirmLogout == true) {
        cursor.pointer;
        window.location.href = "logout.php";
    } else {

    }
}

function logOutAdmin() {
    var confirmLogout = confirm("Apakah Anda ingin keluar?");

    if (confirmLogout == true) {
        window.location.href = "../logout.php";
    } else {
        
    }
}
