<?php
echo "<h1>Hola món!</h1>";

$servername = "db";
$username = "usuari";
$password = "contrasenya";
$dbname = "exemple";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connexió fallida: " . mysqli_connect_error());
}
echo "Connexió a la base de dades 'exemple' establerta amb èxit!";
mysqli_close($conn);
?>
