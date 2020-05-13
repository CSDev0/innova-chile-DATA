<?php
/**
 * coneccion a la Base de datos
 */
class Dbh {
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $charset;

  protected function connect(){
    $this->$servername="servername";
    $this->$username="username";
    $this->$password="password";
    $this->$dbname="dbname";
    $this->$charset="charset";

    try {
      $dsn="mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
      $pdo= new PDO($dns, $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (\Exception $e) {
      echo "Connection failed: ".$e->getMessage();
    }
  }
}



 ?>
