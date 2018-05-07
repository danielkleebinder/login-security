<!--
Author     : Daniel Kleebinder
Created on : 07.05.2018
-->

<?php
if (!isset($_POST['idtoken'])) {
    exit();
}
$google_idtoken = $_POST['idtoken'];
$url = 'https://www.googleapis.com/oauth2/v3/tokeninfo';

$_SESSION['idtoken'] = $google_idtoken;

$post = ['id_token' => $google_idtoken];

echo $google_idtoken;
$ch = curl_init('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$google_idtoken);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo 'Response:' . $response;
?>