<?php include_once($_SERVER['DOCUMENT_ROOT']."/util.php");?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<?php ShowHead();?>
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="/authenticate.php" method="post">
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>