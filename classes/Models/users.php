<?php
  namespace Models;

  /**
   * Esta es una clase provicional mientras que aun no esta echa la DB
   */
  class Users extends Dbh
  {

    protected function getUser($name)
    {
      $sql = "SELECT * FROM users WHERE users_name = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name]);

      $result = $stmt->fetchAll();
      return $result;
    }

    protected function setUser($name,$email,$pwd)
    {
      $sql = "INSERT INTO users(user_name,users_email,users_pwd) VALUES (?,?,?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$name,$email,$pwd]);

    }
  }

 ?>
