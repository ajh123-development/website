<?php require_once __DIR__."/util.php";
$token = json_decode(getToken($_GET["code"]), true);
$_SESSION["token"] = $token['access_token'];
header('Location: /');