<?php
session_start();

function ShowHead(){
	echo<<<EOT
	<meta charset="utf-8">
			<meta lang="en_gb">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
			<link href="/style.css" rel="stylesheet" type="text/css">

	EOT;
}


function ShowNav()
{
	echo<<<EOT
			<a href="/wiki" target="_blank" class="md-header__button nav_btn">Wiki</a>
			<a href="/forum" target="_blank" class="md-header__button nav_btn">Forums</a>

	EOT;
	if (!isset($_SESSION['loggedin'])) {
		echo<<<EOT
				<a href="/register.php" class="md-header__button nav_btn">Sign up</a>
				<a href="/login.php" class="md-header__button nav_btn">Login</a>
		EOT;
	} else {
		echo<<<EOT
				<a href="/profile.php" class="md-header__button nav_btn"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="/logout.php" class="md-header__button nav_btn"><i class="fas fa-sign-out-alt"></i>Logout</a>
		EOT;
	}
}