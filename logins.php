<?php
include 'connect.php';
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_SHA256);
$registriranKorisnik = false;

$sql = "SELECT username  FROM logins WHERE username = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
}
if(mysqli_stmt_num_rows($stmt) < 0){
$msg='Korisničko ime ne postoji !';
}else{

$sql = "INSERT INTO logins (ime, prezime, username, lozinka) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 'ssss', $ime, $prezime, $username, $hashed_password);
    mysqli_stmt_execute($stmt);
    $registriranKorisnik = true;
} else {
    $msg = 'Greška prilikom izvršavanja upita.';
}
}
mysqli_close($dbc);

if($registriranKorisnik == true) {
echo '<p>LOGIN SUCCESSFULL</p>';
header("Location: administracija.php");
exit;

} else {}

?>