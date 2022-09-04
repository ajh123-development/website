<?php

/**
 * Class to handle apps
 */

class App
{
  // Properties

  /**
  * @var int The app ID from the database
  */
  public $id = null;

  /**
  * @var string Full name of the app
  */
  public $name = null;

  /**
  * @var string The version of the app
  */
  public $version = null;

  /**
  * @var string The type of app we are
  */
  public $type = null;

  /**
  * @var string The time that the app was released
  */
  public $dateTime = null;

  /**
  * @var string The json that defines the app
  */
  public $rawJson = null;

  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['name'] ) ) $this->name = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name'] );
    if ( isset( $data['version'] ) ) $this->version = $data['version'];
    if ( isset( $data['type'] ) ) $this->type = $data['type'];
    if ( isset( $data['dateTime'] ) ) $this->dateTime = $data['dateTime'];
    if ( isset( $data['rawJson'] ) ) $this->rawJson = $data['rawJson'];
  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {
    // Store all the parameters
    $this->__construct( $params );
  }


  /**
  * Returns an App object matching the given app ID
  *
  * @param int The app ID
  * @return App|false The app object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM apps WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new App( $row );
  }


  /**
  * Returns all (or a range of) App objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @return Array|false A two-element array : results => array, a list of Article objects; totalRows => Total number of apps
  */

  public static function getList( $numRows=1000000 ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM apps
            ORDER BY id ASC LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $article = new App( $row );
      $list[] = $article;
    }

    // Now get the total number of articles that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current App object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the App object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "App::insert(): Attempt to insert an App object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the App
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO apps ( name, version, type, dateTime, rawJson ) VALUES ( :name, :version, :type, :dateTime, :rawJson )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
    $st->bindValue( ":version", $this->version, PDO::PARAM_STR );
    $st->bindValue( ":type", $this->type, PDO::PARAM_STR );
    $st->bindValue( ":dateTime", $this->dateTime, PDO::PARAM_STR );
    $st->bindValue( ":rawJson", $this->rawJson, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current App object in the database.
  */

  public function update() {

    // Does the App object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "App::update(): Attempt to update an App object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the App
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE apps SET name=:name, version=:version, type=:type, dateTime=:dateTime, rawJson=:rawJson WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
    $st->bindValue( ":version", $this->version, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->bindValue( ":type", $this->type, PDO::PARAM_STR );
    $st->bindValue( ":dateTime", $this->dateTime, PDO::PARAM_STR );
    $st->bindValue( ":rawJson", $this->rawJson, PDO::PARAM_STR );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current App object from the database.
  */

  public function delete() {

    // Does the App object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "App::delete(): Attempt to delete an app object that does not have its ID property set.", E_USER_ERROR );

    // Delete the App
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM apps WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
