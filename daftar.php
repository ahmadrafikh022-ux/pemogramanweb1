<?php

require_once "database.php";
require_once "users.php";

$username = $_POST["username"];
$email = $_POST["email"];
$asal = $_POST["asal"];
$password = $_POST["password"];
$password_ulang = $_POST["password_ulang"];

if (isset($_POST["saya_setuju"])) {

    echo "Anda telah menyetujui form ";

    $database = new Database;
    $conn = $database->connect();

    echo "<br>";
    echo "Database terhubung <br>";

    $user = new Users($conn);

    $user->create($username, $email, $asal, $password);

} else {

    echo "Anda harus menyetujui form";

}
?>