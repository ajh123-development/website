<?php

require( __DIR__."/config.php" );
require( __DIR__."/template.php" );
require_once __DIR__."/../util.php";
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  // session isn't started
  session_start();
}
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
// $username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

// if ( $action != "login" && $action != "logout" && !$username ) {
//   login();
//   exit;
// }

switch ( $action ) {
  // case 'login':
  //   login();
  //   break;
  // case 'logout':
  //   logout();
  //   break;
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


function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login | News";

  if ( isset( $_POST['login'] ) ) {

    // User has posted the login form: attempt to log the user in

    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {

      // Login successful: Create a session and redirect to the admin homepage
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php" );

    } else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      Template::view(TEMPLATE_PATH . "/admin/loginForm.php", [
        'results' => $results
      ]);
    }

  } else {

    // User has not posted the login form yet: display the form
    Template::view(TEMPLATE_PATH . "/admin/loginForm.php", [
      'results' => $results
    ]);
  }

}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}


function newArticle() {
  if (!hasPerm("news.new")){
    header( "Location: /" );
    die;
  }

  $results = array();
  $results['pageTitle'] = "New Article";
  $results['formAction'] = "newArticle";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the new article
    $article = new Article;
    $article->storeFormValues( $_POST );
    $article->insert();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['article'] = new Article;
    Template::view(TEMPLATE_PATH . "/admin/editArticle.php", [
      'results' => $results
    ]);
  }

}


function newApp() {
  if (!hasPerm("news.new")){
    header( "Location: /" );
    die;
  }

  $results = array();
  $results['pageTitle'] = "New App";
  $results['formAction'] = "newApp";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the app edit form: save the new app
    $app = new App;
    $app->storeFormValues( $_POST );
    $app->insert();
    header( "Location: admin.php?action=listApps&status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the app list
    header( "Location: admin.php?action=listApps" );
  } else {

    // User has not posted the app edit form yet: display the form
    $results['app'] = new App;
    Template::view(TEMPLATE_PATH . "/admin/editApp.php", [
      'results' => $results
    ]);
  }

}


function editArticle() {
  if (!hasPerm("news.edit")){
    header( "Location: /" );
    die;
  }

  $results = array();
  $results['pageTitle'] = "Edit Article";
  $results['formAction'] = "editArticle";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the article edit form: save the article changes

    if ( !$article = Article::getById( (int)$_POST['articleId'] ) ) {
      header( "Location: admin.php?error=articleNotFound" );
      return;
    }

    $article->storeFormValues( $_POST );
    $article->update();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the article list
    header( "Location: admin.php" );
  } else {

    // User has not posted the article edit form yet: display the form
    $results['article'] = Article::getById( (int)$_GET['articleId'] );
    Template::view(TEMPLATE_PATH . "/admin/editArticle.php", [
      'results' => $results
    ]);
  }

}


function editApp() {
  if (!hasPerm("news.edit")){
    header( "Location: /" );
    die;
  }

  $results = array();
  $results['pageTitle'] = "Edit App";
  $results['formAction'] = "editApp";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the app edit form: save the app changes

    if ( !$app = App::getById( (int)$_POST['appId'] ) ) {
      header( "Location: admin.php?action=listApps&error=appNotFound" );
      return;
    }

    $app->storeFormValues( $_POST );
    $app->update();
    header( "Location: admin.php?action=listApps&status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the app list
    header( "Location: admin.php?action=listApps" );
  } else {

    // User has not posted the app edit form yet: display the form
    $results['app'] = App::getById( (int)$_GET['appId'] );
    Template::view(TEMPLATE_PATH . "/admin/editApp.php", [
      'results' => $results
    ]);
  }

}


function deleteArticle() {
  if (!hasPerm("news.del")){
    header( "Location: /" );
    die;
  }

  if ( !$article = Article::getById( (int)$_GET['articleId'] ) ) {
    header( "Location: admin.php?error=articleNotFound" );
    return;
  }

  $article->delete();
  header( "Location: admin.php?status=articleDeleted" );
}


function listArticles() {
  if (!hasPerm("news.list")){
    header( "Location: /" );
    die;
  }

  $results = array();
  $data = Article::getList();
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Articles";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Error: Article not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Article deleted.";
  }

  Template::view(TEMPLATE_PATH . "/admin/listArticles.php", [
    'results' => $results
  ]);
}

function listApps() {
  if (!hasPerm("news.list")){
    header( "Location: /" );
    die;
  }

  $results = array();
  $data = App::getList();
  $results['apps'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Apps";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "appNotFound" ) $results['errorMessage'] = "Error: App not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "appDeleted" ) $results['statusMessage'] = "App deleted.";
  }

  Template::view(TEMPLATE_PATH . "/admin/listApps.php", [
    'results' => $results
  ]);
}

?>
