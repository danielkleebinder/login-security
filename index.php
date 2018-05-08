<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<?php
$index_page = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Make sure https is used
if ($_SERVER['HTTPS'] !== 'on') {
    header('Location: ' . $index_page);
    exit();
}

// Start the session
session_start();
$_SESSION['index_page'] = $index_page;
?>

<?php
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    require_once './action/login.php';
    login_user_with_cookies();
}

$action = isset($_GET['action']) ? $_GET['action'] : 'none';

if ($action === 'login') {
    require_once './action/login.php';
}
if ($action === 'logout') {
    require_once './action/logout.php';
}

$google_login = isset($_SESSION['google_login']) ? $_SESSION['google_login'] : false;
$default_login = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;

$logged_in = $default_login || $google_login;
if ($logged_in) {
    $_SESSION['csrf_token'] = uniqid('', true);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Datasecurity | <?php echo $logged_in ? 'Home' : 'Login'; ?></title>
        <link rel="icon" href="favicon.png"/>

        <!-- Website meta data -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#007F0E">

        <!-- Bind JavaScript -->
        <script type="text/javascript" src="./js/libs/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="./js/libs/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/libs/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>

        <!-- Bind StyleSheets -->
        <link rel="stylesheet" type="text/css" href="./css/libs/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="./css/libs/jquery.fancybox.min.css"/>
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header>
            <div class="jumbotron text-center" style="background-color: #704f0e; height: 220px;">
                <h1 style="color: #ffffff; font-weight: bolder;">Web Application Security</h1>
            </div>
        </header>
        <main>
            <section id="content">
                <div class="container">
                    <div class="row">
                        <?php
                        if (!$logged_in) {
                            require_once 'php/login_form.php';
                        }
                        if ($logged_in) {
                            require_once 'php/authenticated.php';
                        }
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>