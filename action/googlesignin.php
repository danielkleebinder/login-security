<?php

if (!isset($_POST['idtoken'])) {
    exit();
}
$google_idtoken = $_POST['idtoken'];
$url = 'https://www.googleapis.com/oauth2/v4/token';

$_SESSION['idtoken'] = $google_idtoken;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . $google_idtoken);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
echo curl_exec($ch);
?>