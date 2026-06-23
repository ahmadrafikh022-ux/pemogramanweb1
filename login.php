<?php
session_start();

require_once("database.php");
require_once("users.php");

if (!isset($_POST['input_username']) || !isset($_POST['input_password'])) {
    header("Location: index.html");
    exit();
}

$username = $_POST["input_username"];
$password = $_POST["input_password"];

$db = new Database();
$conn = $db->connect();
$user = new User($conn);

$ditemukan = $user->login($username, $password);

if ($ditemukan == false) {
    $_SESSION['pesan_kesalahan'] = "Login Gagal";
    header("Location: index.php");
    exit;
} else {
    $_SESSION['is_logged_in'] = true;
    $_SESSION['username'] = $username;
    
    if (isset($ditemukan['login_count'])) {
        $_SESSION['login_count'] = $ditemukan['login_count'];
    } else {
        $_SESSION['login_count'] = 5; 
    }

    header("Location: dashboard/index.php");
    exit;
}