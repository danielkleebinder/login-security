<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<?php
if (isset($_SESSION['csrf_token'])) {
    if (!isset($_GET['csrf']) || $_GET['csrf'] !== $_SESSION['csrf_token']) {
        die('Wrong CSRF Token');
    }
}

if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie('username', null, time() - 3600, '/');
}

if (isset($_COOKIE['password'])) {
    unset($_COOKIE['password']);
    setcookie('password', null, time() - 3600, '/');
}

if (isset($_SESSION['idtoken'])) {
    $google_idtoken = $_SESSION['idtoken'];
    $url = 'https://accounts.google.com/o/oauth2/revoke?token=';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $google_idtoken);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $data = json_decode(curl_exec($ch), true);
}

session_unset();
session_destroy();
?>