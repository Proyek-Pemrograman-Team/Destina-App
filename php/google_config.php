<?php
require_once 'google-api/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');         // Ganti ini
$client->setClientSecret('YOUR_CLIENT_SECRET'); // Ganti ini
$client->setRedirectUri('http://localhost/Web-Wisata/php/google_callback.php');
$client->addScope("email");
$client->addScope("profile");
