<?php
if(str_ends_with($_SERVER["REQUEST_URI"], "version_manifest.json")){
	$game = "history_survival";
	if(isset($_GET["USE_MC"])){
		$game = "mc";
	}
	$file = 'files/'.$game.'/version_manifest.json';

	if (file_exists($file)) {
		header('Content-Type: '.mime_content_type($file));
		header('Content-Disposition: inline; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
	die;
}

?>

<!-- <!DOCTYPE html>
<html>
	<head>
		<title>Downloads Page</title>
		<?php //ShowHead();?>
	</head>
	<body class="main">
		<?php //ShowNav()?>
		<div class="content">
			<h2>Downloads Page</h2>
			<?php //if (isset($_SESSION['loggedin'])) {
				//echo("<p>Welcome back, ".$_SESSION['name']."!</p>\n");
			//} ?>
			<p>Showing 0 of 0 downloads</p>
			<?php 
			// echo($_SERVER["REQUEST_URI"]); 
			// var_dump($_GET);?>
		</div>
	</body>
</html> -->