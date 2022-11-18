<?php
require_once __DIR__."/config.php";
require_once __DIR__."/template.php";
require_once __DIR__."/../util.php";



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