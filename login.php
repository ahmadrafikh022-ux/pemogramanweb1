<?php
session_start();

require_once("database.php");
require_once("users.php");

$username = $_POST['input_username'] ?? '';
$password = $_POST['input_password'] ?? '';

$db = new Database();
$conn = $db->connect();

$user = new Users($conn);

if ($user->login($username, $password)) {

    $_SESSION['is_logged_in'] = true;
    $_SESSION['username'] = $username;

    header("Location: dashboard/index.php");
    exit();

} else {
    echo "<h4> Username atau password salah! </h4>";

}