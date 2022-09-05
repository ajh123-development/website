<?php
if(str_ends_with($_SERVER["REQUEST_URI"], "version_manifest.json")){
	$game = "history_survival";
	if(isset($_GET["USE_MC"])){
		$game = "mc";
	}
	$file = 'files/'.$game.'/version_manifest.json';
	if ($game != "history_survival" ) {
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
}

header('Content-Type: application/json');
require( __DIR__."/news/config.php" );
if (!isset($_GET["id"])){
	$apps = App::getList()["results"];
	$out = array();

	$latest_release = $apps[count($apps)-1]->version;
	$latest_snapshot = $apps[count($apps)-1]->version;
	$index = 0;
	$url = "https://minersonline.tk/download.php/";
	foreach ( $apps as $app ) {
		if ($app->type == "release"){$latest_release=$app->version;}
		if ($app->type == "snapshot"){$latest_release=$app->version;}
		$out["versions"][$index] = array(
			"id" => $app->version,
			"type" => $app->type,
			"url" => $url."?id=".$app->id,
			"time" => $app->dateTime,
			"releaseTime" => $app->dateTime,
		);
		$index = $index + 1;
	}
	$out["latest"]["release"] = $latest_release;
	$out["latest"]["snapshot"] = $latest_snapshot;

	echo json_encode($out, JSON_UNESCAPED_SLASHES);
	die;
}

if (isset($_GET["id"])){
	$app = App::getById($_GET["id"]);
	header('Content-Type: application/json');
	echo($app->rawJson);
	die;
}

?>
{
    "latest": {
        "release": "hs-0.0.2",
        "snapshot": "hs-0.0.2"
    },
    "versions": [
        {
            "id": "hs-0.0.1",
            "type": "release",
            "url": "https://minersonline.ddns.net/files/history_survival/packages/0.0.1/0.0.1.json",
            "time": "2022-05-10T20:14:49+01:00",
            "releaseTime": "2022-05-10T20:14:49+01:00"
        },
        {
            "id": "hs-0.0.2",
            "type": "release",
            "url": "https://minersonline.ddns.net/files/history_survival/packages/0.0.2/0.0.2.json",
            "time": "2022-07-27T16:11:27+01:00",
            "releaseTime": "2022-07-27T16:11:27+01:00"
        }
    ]
}