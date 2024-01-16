function logOut() {
    var confirmLogout = confirm("Apakah Anda ingin keluar?");

    if (confirmLogout) {
        window.location.href = "logout.php";
    } else {

    }
}

function logOutAdmin() {
    var confirmLogout = confirm("Apakah Anda ingin keluar?");

    if (confirmLogout) {
        window.location.href = "../logout.php";
    } else {
        
    }
}
