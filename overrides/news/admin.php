<?php
require_once __DIR__."/app.php";
require_once __DIR__."/article.php";

require_once __DIR__."/config.php";
require_once __DIR__."/template.php";
require_once __DIR__."/../util.php";
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  // session isn't started
  session_start();
}
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'newArticle':
    newArticle();
    break;
  case 'newApp':
    newApp();
    break;
  case 'editArticle':
    editArticle();
    break;
  case 'editApp':
    editApp();
    break;
  case 'deleteArticle':
    deleteArticle();
    break;
  case 'listApps':
    listApps();
    break;
  default:
    listArticles();
}
?>
