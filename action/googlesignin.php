<!--
Author     : Daniel Kleebinder
Created on : 07.05.2018
-->

<?php
if (!isset($_POST['idtoken'])) {
    exit();
}
$google_idtoken = $_POST['idtoken'];
$_SESSION['idtoken'] = $google_idtoken;
echo $google_idtoken;
?>