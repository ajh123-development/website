<?php
require_once __DIR__."/config.php";
require_once __DIR__."/template.php";
require_once __DIR__."/../util.php";



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