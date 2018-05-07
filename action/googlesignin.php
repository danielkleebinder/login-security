<?php

if (!isset($_POST['idtoken'])) {
    exit();
}

session_start();

$google_idtoken = $_POST['idtoken'];
$url = 'https://www.googleapis.com/oauth2/v4/token';

$_SESSION['idtoken'] = $google_idtoken;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . $google_idtoken);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$data = json_decode(curl_exec($ch), true);

if (!isset($data['name'])) {
    $_SESSION['google_login'] = false;
    $_SESSION['logged_in'] = false;
    return 'error';
}
$_SESSION['username'] = $data['name'];
$_SESSION['google_login'] = true;
$_SESSION['logged_in'] = true;
echo 'ok';
?>