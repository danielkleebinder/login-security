<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<?php
$correct_credentials = true;
$username = null;
$password = null;
$remember = isset($_COOKIE['remember']) ? $_COOKIE['remember'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $remember = isset($_POST['remember']) ? $_POST['remember'] : null;

    // Cookie expires in one year from now
    $expire = time() + 60 * 60 * 24 * 365;

    // Generate sha hash code (mostly for cookies)
    $password = hash('sha256', $password);
    $correct_credentials = login_user($username, $password);
    setcookie('remember', $remember, $expire, '/', '', false, false);

    // If the login is successful, save cookies
    if ($correct_credentials && $remember) {
        /*
         * secure
         *    Indicates that the cookie should only be transmitted over a secure HTTPS connection from
         * the client. When set to TRUE, the cookie will only be set if a secure connection exists. On
         * the server-side, it's on the programmer to send this kind of cookie only on secure
         * connection (i.e. with respect to $_SERVER["HTTPS"]).
         */

        /* httponly
         *    When TRUE the cookie will be made accessible only through the HTTP protocol. This means
         * that the cookie won't be accessible by scripting languages, such as JavaScript. It has been
         * suggested that this setting can effectively help to reduce identity theft through XSS attacks
         * (although it is not supported by all browsers), but that claim is often disputed. Added in
         * PHP 5.2.0. TRUE or FALSE
         */
        setcookie('username', $username, $expire, '/', '', true, true);
        setcookie('password', $password, $expire, '/', '', true, true);
    }
}

function login_user($usr, $pwd) {
    $GLOBAL_USERNAME = 'admin';
    $GLOBAL_PASSWORD = hash('sha256', 'ad123');

    $result = strcasecmp($usr, $GLOBAL_USERNAME) == 0 && $pwd === $GLOBAL_PASSWORD;
    $_SESSION['username'] = ucfirst(strtolower($usr));
    $_SESSION['logged_in'] = $result;
    return $result;
}

function login_user_with_cookies() {
    $username = null;
    $password = null;

    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
    }
    if (isset($_COOKIE['password'])) {
        $password = $_COOKIE['password'];
    }

    login_user($username, $password);
}
?>