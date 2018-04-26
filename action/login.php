<?php

$correct_credentials = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $correct_credentials = strcasecmp($username, 'admin') == 0 && $password === 'ad123';
    $_SESSION['username'] = ucfirst(strtolower($username));
}
$_SESSION['logged_in'] = $correct_credentials;
?>