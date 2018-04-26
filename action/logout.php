<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<?php
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie('username', null, time() - 3600, '/');
}

if (isset($_COOKIE['password'])) {
    unset($_COOKIE['password']);
    setcookie('password', null, time() - 3600, '/');
}

session_unset();
session_destroy();
?>