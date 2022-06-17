<?php
include_once($_SERVER['DOCUMENT_ROOT']."/util.php");

$hash = "sha512";

function gen_uuid() {
	return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		// 32 bits for "time_low"
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

		// 16 bits for "time_mid"
		mt_rand( 0, 0xffff ),

		// 16 bits for "time_hi_and_version",
		// four most significant bits holds version number 4
		mt_rand( 0, 0x0fff ) | 0x4000,

		// 16 bits, 8 bits for "clk_seq_hi_res",
		// 8 bits for "clk_seq_low",
		// two most significant bits holds zero and one for variant DCE1.1
		mt_rand( 0, 0x3fff ) | 0x8000,

		// 48 bits for "node"
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	);
}

// Change this to your connection info.
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'mjolnir';
$DATABASE_PASS = 'RI0Yjnc5trf3l(U0';
$DATABASE_NAME = 'mjolnir';
$DATABASE_PREFIX = 'users_';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// Now we check if the data was submitted, isset() function will check if the data exists.
	if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
		// Could not get the data that should have been sent.
		exit('Please complete the registration form!');
	}
	// Make sure the submitted registration values are not empty.
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
		// One or more values are empty.
		exit('Please complete the registration form');
	}

	// We need to check if the account with that username exists.
	if ($stmt = $con->prepare('SELECT id, password FROM '.$DATABASE_PREFIX.'accounts WHERE username = ?')) {
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			exit('Email is not valid!');
		}
		if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username']) == 0) {
			exit('Username is not valid!');
		}
		// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		$stmt->store_result();
		// Store the result so we can check if the account exists in the database.
		if ($stmt->num_rows > 0) {
			// Username already exists
			echo 'Username exists, please choose another!';
		} else {
			// Username doesnt exists, insert new account
			if ($stmt = $con->prepare('INSERT INTO '.$DATABASE_PREFIX.'accounts (id, username, password, playerName, hash) VALUES (?, ?, ?, ?, ?)')) {
				// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
				$password = hash($hash, $_POST['password']);
				$uuid = gen_uuid();
				$stmt->bind_param('sssss', $uuid, $_POST['email'], $password, $_POST['username'], $hash);
				$stmt->execute();
				echo 'You have successfully registered, you can now login!';
			} else {
				// Something is wrong with the sql statement, check to make sure accounts table exists with all 5 fields.
				echo 'Could not prepare statement!';
			}
		}
		$stmt->close();
	} else {
		// Something is wrong with the sql statement, check to make sure accounts table exists with all 5 fields.
		echo 'Could not prepare statement!';
	}
	$con->close();
}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<?php ShowHead();?>
	</head>
	<body>
		<div class="register">
			<h1>Register</h1>
			<form action="/register.php" method="post" autocomplete="off">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register">
			</form>
		</div>
	</body>
</html>