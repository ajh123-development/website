<?php require_once __DIR__."/util.php";
$token = getToken($_GET["code"]);
$_SESSION["token"] = $token;
header('Location: /');