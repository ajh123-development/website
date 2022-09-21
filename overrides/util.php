<?php
// require __DIR__ . '/vendor/autoload.php';
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
	// session isn't started
	session_start();
}

$ini = parse_ini_file('miners.ini', true);
$client_id = $ini['oauth']['client_id'];

function ShowHead() {
	echo<<<EOT
	<meta charset="utf-8">
			<meta lang="en_gb">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link href="/style.css" rel="stylesheet" type="text/css">

	EOT;
}


function ShowNav() {
	global $client_id;

	echo<<<EOT
			<a href="/news" class="md-header__button nav_btn">News</a>

	EOT;
	if (getMyId() === false) {
		echo<<<EOT
				<a href="/api/auth/register.php" class="md-header__button nav_btn">Sign up</a>
				<a href="/api/auth/authorize.php?response_type=code&client_id=$client_id&state=xyz" class="md-header__button nav_btn">Login</a>
		EOT;
	} else {
		echo<<<EOT
				<a href="/profile.php" class="md-header__button nav_btn"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="/logout.php" class="md-header__button nav_btn"><i class="fas fa-sign-out-alt"></i>Logout</a>
		EOT;
	}
}

function getToken($authToken) {
	if (!isset($authToken)){
		return false;
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.tk/api/auth/token.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, $client_id+":"+$ini['oauth']['credentials']);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=authorization_code&code='.$authToken);
	
	$response = curl_exec($ch);
	
	curl_close($ch);
	return $response;
}

function getUser($id) { 
	if (!isset($_SESSION["token"])){
		return false;
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.tk/api/auth/v1/getUser.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'id='.$id.'&access_token='.$_SESSION["token"]);

	$response = curl_exec($ch);

	curl_close($ch);

	if ($response !== false){
		if (json_decode($response, true) === array(
			'error' => 'ForbiddenOperationException', 
			'error_description' => 'You are not logged in'
		)) {return false;}
	}
	return $response;
}

function getMyId() {
	if (!isset($_SESSION["token"])){
		return false;
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.tk/api/auth/v1/getCurrent.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'access_token='.$_SESSION["token"]);

	$response = curl_exec($ch);

	curl_close($ch);
	if ($response !== false){
		if (json_decode($response, true) === array(
			'error' => 'invalid_token', 
			'error_description' => 'The access token provided is invalid'
		)) {return false;}
	}
	return $response;
}

function getPerms() {
	if (!isset($_SESSION["token"])){
		return false;
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://minersonline.tk/api/auth/v1/getPerms.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type' => 'application/x-www-form-urlencoded',
	]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'access_token='.$_SESSION["token"]);

	$response = curl_exec($ch);

	curl_close($ch);
	if ($response !== false){
		if (json_decode($response, true) === array(
			'error' => 'invalid_token', 
			'error_description' => 'The access token provided is invalid'
		)) {return false;}
	}
	return $response;
}

function hasPerm($perm){
	$json_perms = getPerms();
	if ($json_perms == null){return false;}
	$permissions = json_decode($json_perms, true)["permissions"];
	return in_array($perm , $permissions);
}