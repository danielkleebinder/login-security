<?php session_start(); ?>
<!DOCTYPE html>
<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->
<html lang="de" dir="ltr">
    <head>
        <title>Datasecurity | Login</title>
        <link rel="icon" href="favicon.png"/>

        <!-- Website meta data -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#007F0E">

        <!-- Bind JavaScript -->
        <script type="text/javascript" src="js/libs/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/libs/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <!-- Bind StyleSheets -->
        <link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/libs/jquery.fancybox.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>

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
                        $action = isset($_GET['action']) ? $_GET['action'] : 'none';

                        if ($action === 'login') {
                            require_once './action/login.php';
                        }
                        if ($action === 'logout') {
                            require_once './action/logout.php';
                        }

                        $logged_in = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;

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