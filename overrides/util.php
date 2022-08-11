<?php
require __DIR__ . '/vendor/autoload.php';
session_start();

function ShowHead() {
	echo<<<EOT
	<meta charset="utf-8">
			<meta lang="en_gb">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link href="/style.css" rel="stylesheet" type="text/css">

	EOT;
}


function ShowNav() {
	echo<<<EOT
			<a href="/wiki" target="_blank" class="md-header__button nav_btn">Wiki</a>
			<a href="/forum" target="_blank" class="md-header__button nav_btn">Forums</a>

	EOT;
	if (getMyId() !== false) {
		echo<<<EOT
				<a href="/api/auth/register.php" class="md-header__button nav_btn">Sign up</a>
				<a href="/api/auth/authorize.php?response_type=code&client_id=minersonline&state=xyz" class="md-header__button nav_btn">Login</a>
		EOT;
	} else {
		echo<<<EOT
				<a href="/profile.php" class="md-header__button nav_btn"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="/api/auth/logout.php" class="md-header__button nav_btn"><i class="fas fa-sign-out-alt"></i>Logout</a>
		EOT;
	}
}

function getToken($authToken) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.ddns.net/api/auth/token.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, 'minersonline:testpass');
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=authorization_code&code='.$authToken);
	
	$response = curl_exec($ch);
	
	curl_close($ch);
	return $response;
}

function getUser($id) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.ddns.net/api/auth/v1/getUser.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'id='.$id.'&access_token='.$_SESSION["token"]);

	$response = curl_exec($ch);

	curl_close($ch);
	return $response;
}

function getMyId() {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.ddns.net/api/auth/v1/getCurrent.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'access_token='.$_SESSION["token"]);

	$response = curl_exec($ch);

	curl_close($ch);
	return $response;
}