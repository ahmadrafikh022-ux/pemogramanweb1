<?php
require_once "../database.php";
require_once "../users.php";    

$username = $_POST["username"];
$email = $_POST["email"];
$asal = $_POST["asal"];     
$password = $_POST["password"];
$database = new Database;

$conn = $database->connect();   
$user = new User($conn);
$user->update($_POST['id'], $username, $email, $asal, $password);    

header("Location: index.php?halaman=daftar_user");  