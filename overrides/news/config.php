<?php
require(__DIR__."/../util.php" );
ini_set( "display_errors", true );
$host = $ini["database/news"]["db_host"];
$table = $ini["database/news"]["db_table"];
$username = $ini["database/news"]["db_username"];
$password = $ini["database/news"]["db_password"];
date_default_timezone_set( "Europe/London" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=$host;dbname=$table" );
define( "DB_USERNAME", "$username" );
define( "DB_PASSWORD", "$password" );
define( "CLASS_PATH", __DIR__."/classes" );
define( "TEMPLATE_PATH", __DIR__."/templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/Article.php" );
require( CLASS_PATH . "/App.php" );

function handleException( $exception ) {
  // echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
  $error=$exception->getMessage()."\r\n".$exception->getTraceAsString();
  $results['issue'] = "Sorry, a problem occurred. Please try later.\r\n$error";
  Template::view(TEMPLATE_PATH . "/issue.php", [
    'results' => $results
  ]);
}

set_exception_handler( 'handleException' );
?>
